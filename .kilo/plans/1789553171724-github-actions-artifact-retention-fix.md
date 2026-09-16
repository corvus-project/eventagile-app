# GitHub Actions Artifact Storage Quota Fix

## Problem
The GitHub Actions workflow fails with: `Artifact storage quota has been hit. Unable to upload any new artifacts.`

## Root Cause
- `actions/upload-artifact@v4` defaults to 90-day retention
- Every push to `main` creates a new artifact (`eventagile-artifact-${GITHUB_RUN_NUMBER}.tar.gz`)
- Accumulated artifacts exceed storage limit

## Fix
Add `retention-days: 1` to the upload-artifact step in `.github/workflows/deploy.yml` (line 122-126).

### Change
```yaml
- name: Upload artifact
  uses: actions/upload-artifact@v4
  with:
    name: release-artifact
    path: ./artifacts/
    retention-days: 1  # ADD THIS LINE
```

## Notes
- `retention-days` must be 1-90 (up to 400 for private repos)
- Only affects **new** artifacts; existing ones need manual cleanup in GitHub UI
- 1 day is sufficient since artifacts are deployed immediately and not needed after deploy