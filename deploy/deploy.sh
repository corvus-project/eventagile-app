#!/usr/bin/env bash
# deploy.sh - minimal atomic deploy script for a releases-based layout
# Usage: ./deploy.sh /path/to/artifact.tar.gz
# Expects these directories under DEPLOY_PATH (this script assumes cwd is DEPLOY_PATH):
# - releases/ (artifact will be extracted into a timestamped folder)
# - shared/ (.env, storage, logs live here)
# - current -> symlink to current release

set -euo pipefail

if [ -z "${1-}" ]; then
  echo "Usage: $0 /path/to/artifact.tar.gz [site]"
  echo "  site can be: website|tenant|management or a full DEPLOY_PATH"
  exit 2
fi

ARTIFACT_PATH="$1"
SITE_ARG="${2-}"

# Default deployment base paths (adjust if your server uses different locations)
DEFAULT_WEBSITE_PATH="/var/www/eventagile-website"
DEFAULT_TENANT_PATH="/var/www/eventagile-tenant"
DEFAULT_MANAGEMENT_PATH="/var/www/eventagile-management"

# Determine DEPLOY_PATH:
if [ -n "$SITE_ARG" ]; then
  case "$SITE_ARG" in
    website)
      DEPLOY_PATH="${DEPLOY_PATH:-$DEFAULT_WEBSITE_PATH}"
      ;;
    tenant)
      DEPLOY_PATH="${DEPLOY_PATH:-$DEFAULT_TENANT_PATH}"
      ;;
    management)
      DEPLOY_PATH="${DEPLOY_PATH:-$DEFAULT_MANAGEMENT_PATH}"
      ;;
    /*)
      # absolute path provided
      DEPLOY_PATH="$SITE_ARG"
      ;;
    *)
      # treat as a custom relative or absolute path
      DEPLOY_PATH="$SITE_ARG"
      ;;
  esac
else
  # If no site arg provided, assume current working directory (backwards compatible)
  DEPLOY_PATH="${DEPLOY_PATH:-$(pwd)}"
fi

RELEASES_DIR="$DEPLOY_PATH/releases"
SHARED_DIR="$DEPLOY_PATH/shared"
TIMESTAMP=$(date +%Y%m%d%H%M%S)
RELEASE_DIR="$RELEASES_DIR/$TIMESTAMP"
KEEP=${DEPLOY_KEEP_RELEASES:-5}

echo "Deploying artifact: $ARTIFACT_PATH"
echo "Target deploy path: $DEPLOY_PATH"
echo "Release directory: $RELEASE_DIR"

echo "Deploying artifact: $ARTIFACT_PATH to $RELEASE_DIR"

# Ensure directories
mkdir -p "$RELEASE_DIR"
mkdir -p "$SHARED_DIR/storage/framework/cache/data"
mkdir -p "$SHARED_DIR/storage/framework/sessions"
mkdir -p "$SHARED_DIR/storage/framework/views"
mkdir -p "$SHARED_DIR/storage/app/public"
mkdir -p "$SHARED_DIR/storage/logs"

# Extract artifact into release dir
tar -xzf "$ARTIFACT_PATH" -C "$RELEASE_DIR"

# Symlink shared resources
if [ -f "$SHARED_DIR/.env" ]; then
  ln -sf "$SHARED_DIR/.env" "$RELEASE_DIR/.env"
else
  echo "Warning: $SHARED_DIR/.env not found. Please create before running deploy."
fi

# Link storage to shared
rm -rf "$RELEASE_DIR/storage"
ln -sf "$SHARED_DIR/storage" "$RELEASE_DIR/storage"

# Set permissions (assumes www-data user/group)
chown -R $USER:www-data "$RELEASE_DIR"
chmod -R ug+rwx "$SHARED_DIR/storage"
chmod -R ug+rwx "$RELEASE_DIR/storage"

# Run migrations and caches
# Consider maintenance mode for long migrations
if [ -x "$RELEASE_DIR/artisan" ]; then
  echo "Running artisan migrate and caches"
  cd "$RELEASE_DIR"
  # Ensure public storage symlink exists for Laravel file storage
  if [ ! -e public/storage ]; then
    php artisan storage:link || true
  fi
  # warm caches (config:cache will read .env)
  php artisan migrate --force || { echo "Migration failed"; exit 3; }
  php artisan config:clear || true
  php artisan config:cache || true
  php artisan route:cache || true
  php artisan view:cache || true
  cd - > /dev/null
fi

# Atomic symlink swap
ln -sfn "$RELEASE_DIR" "$DEPLOY_PATH/current"

# Restart PHP-FPM (graceful) and queue worker
# Adjust php-fpm service name if needed (php8.4-fpm vs php8.3-fpm)
if command -v systemctl >/dev/null 2>&1; then
  echo "Reloading php-fpm and nginx"
  systemctl reload php8.4-fpm || true
  systemctl reload nginx || true
  # Restart supervisor workers (if configured)
  supervisorctl reread || true
  supervisorctl update || true
  supervisorctl restart all || true
fi

# Cleanup old releases
cd "$RELEASES_DIR"
ls -1tr | head -n -$KEEP | xargs -r rm -rf --
cd - > /dev/null

echo "Deploy complete: $RELEASE_DIR"
