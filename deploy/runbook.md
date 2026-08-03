Runbook: Provisioning, Deploying and Rollback (eventagile-app)

This is a concise runbook for provisioning the server, performing the first manual deploy, and using the GitHub Actions workflow for subsequent deploys.

1) Initial server provisioning (Ubuntu 22.04 recommended)

# Update & essentials
sudo apt update && sudo apt -y upgrade
sudo apt -y install nginx mariadb-server unzip git curl wget ca-certificates
# swap (1GB)
sudo fallocate -l 1G /swapfile
sudo chmod 600 /swapfile
sudo mkswap /swapfile
sudo swapon /swapfile
echo '/swapfile none swap sw 0 0' | sudo tee -a /etc/fstab
sudo sysctl vm.swappiness=10

# PHP and extensions (adjust version if needed)
sudo apt -y install php8.1-fpm php8.1-cli php8.1-mbstring php8.1-xml php8.1-mysql php8.1-zip php8.1-gd php8.1-curl php8.1-intl
sudo systemctl enable php8.1-fpm

# Supervisor for queue workers
sudo apt -y install supervisor

# Composer (optional server-side)
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Create deploy user and directories
sudo adduser --disabled-password --gecos "" deploy
sudo usermod -aG www-data deploy
DEPLOY_PATH=/var/www/eventagile-app
sudo mkdir -p $DEPLOY_PATH/releases $DEPLOY_PATH/shared/storage $DEPLOY_PATH/shared/logs
sudo chown -R deploy:www-data $DEPLOY_PATH
sudo chmod -R 775 $DEPLOY_PATH/shared

# Place your .env in $DEPLOY_PATH/shared/.env (do NOT commit to repo)

# Install certbot for SSL
sudo apt -y install certbot python3-certbot-nginx python3-certbot-dns-cloudflare

# Cloudflare DNS and SSL setup
# 1) In Cloudflare DNS, create records for your origin server:
#    - A record: eventagile.com -> <server-ip> (orange cloud enabled)
#    - CNAME record: www -> eventagile.com (orange cloud enabled)
#    - CNAME record: app -> eventagile.com (orange cloud enabled) if you plan to proxy the management site later
#    - Optional wildcard record: *.eventagile.com -> eventagile.com
#      * On Cloudflare free plan, wildcard records are typically DNS-only, not proxied.
#      * If you want Cloudflare proxying for tenants, create explicit DNS records per tenant instead.
# 2) In Cloudflare SSL/TLS, choose Full (strict) and install an origin certificate on the server.
# 3) To issue a wildcard certificate from Let's Encrypt, use the DNS Cloudflare plugin:
#    - Create /etc/letsencrypt/cloudflare.ini with Cloudflare API token:
#      dns_cloudflare_api_token = <your-token>
#    - Protect the file: sudo chmod 600 /etc/letsencrypt/cloudflare.ini
#    - Run:
#      sudo certbot certonly --dns-cloudflare --dns-cloudflare-credentials /etc/letsencrypt/cloudflare.ini \
#        -d eventagile.com -d '*.eventagile.com' --agree-tos --noninteractive --email you@example.com
# 4) Use the generated cert files in Nginx:
#      /etc/letsencrypt/live/eventagile.com/fullchain.pem
#      /etc/letsencrypt/live/eventagile.com/privkey.pem
#
# Separate Laravel applications and deploy paths:
#    /var/www/eventagile-website/releases
#    /var/www/eventagile-website/shared
#    /var/www/eventagile-tenant/releases
#    /var/www/eventagile-tenant/shared
#    /var/www/eventagile-management/releases  # later
#
# Place files from templates into appropriate locations:
# - nginx server block: /etc/nginx/sites-available/eventagile-app
# - php-fpm pool: /etc/php/8.1/fpm/pool.d/www.conf (replace existing or adjust)
# - MariaDB tuning: /etc/mysql/mariadb.conf.d/99-custom.cnf
# - Supervisor conf: /etc/supervisor/conf.d/eventagile-worker.conf

# Restart services after config changes
sudo systemctl restart php8.1-fpm
sudo systemctl reload nginx
sudo supervisorctl reread && sudo supervisorctl update

2) Manual first deploy (from local machine)
# Create a release artifact locally using the same packaging procedure as Actions
# Copy artifact to server
scp eventagile-artifact-*.tar.gz deploy@YOUR_SERVER:/var/www/eventagile-app/releases/
# Copy the deploy.sh script
scp deploy.sh deploy@YOUR_SERVER:/var/www/eventagile-app/
# SSH into server and run deploy script
ssh deploy@YOUR_SERVER 'cd /var/www/eventagile-app && ./deploy.sh releases/eventagile-artifact-XXXX.tar.gz'

3) GitHub Actions based deploy
# Add repository secrets (SSH_PRIVATE_KEY, SSH_USER, SSH_HOST, SSH_PORT, DEPLOY_PATH)
# Push to main branch to trigger the build+deploy workflow

4) Rollback procedure
# List releases on server
ls -1 /var/www/eventagile-app/releases
# Switch current symlink to previous release
sudo ln -sfn /var/www/eventagile-app/releases/<previous> /var/www/eventagile-app/current
# Restart php-fpm and supervisor workers
sudo systemctl reload php8.1-fpm
sudo supervisorctl restart all

5) Backups
# Example cron job for nightly DB dump to /var/backups/mysql
0 2 * * * /usr/bin/mysqldump -u root -p"DB_ROOT_PASSWORD" --all-databases | gzip > /var/backups/mysql/db-$(date +\%F).sql.gz

6) Health checks and monitoring
# After deploy, run healthcheck (replace domain)
curl -fsS https://YOUR_DOMAIN/ || echo "Health check failed"

7) Tuning notes
# If OOM occurs, reduce php-fpm pm.max_children and restart php-fpm
# Increase swap only as last resort

8) Useful commands
# Show last Laravel logs
tail -n 200 /var/www/eventagile-app/shared/logs/laravel.log

# Check supervisor status
sudo supervisorctl status

# Check php-fpm processes
ps aux | grep php-fpm

# Check memory
free -m


End of runbook
