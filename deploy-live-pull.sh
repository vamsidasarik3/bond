#!/usr/bin/env bash
# ==============================================================================
# Navagruha Infra Developers — Live Server Pull & Deploy Script
# Run this script on your LIVE server (Linux / cPanel Terminal / VPS / SSH)
# Usage: bash deploy-live-pull.sh [--seed]
# ==============================================================================
set -e

# Change to repository root
cd "$(dirname "$0")"

echo ""
echo "=========================================================="
echo "    NAVAGRUHA INFRA — LIVE SERVER PULL & DEPLOY SCRIPT    "
echo "=========================================================="
echo " Timestamp: $(date '+%Y-%m-%d %H:%M:%S')"
echo ""

# 1. Verify directory & Git setup (Auto-initialize if .git is missing)
if [ ! -d ".git" ]; then
    echo " [NOTICE] '.git' directory not found in: $(pwd)"
    
    # Check if artisan exists in current folder
    if [ ! -f "artisan" ]; then
        echo ""
        echo " [ERROR] 'artisan' file was not found in this folder!"
        echo " You must run this script from your Laravel project directory."
        echo " Typical examples:"
        echo "   cd ~/public_html"
        echo "   cd /var/www/html"
        echo "   cd /home/YOUR_USERNAME/public_html"
        echo ""
        echo " Check your current directory by typing: pwd"
        echo " List files in current directory by typing: ls -la"
        exit 1
    fi

    echo " -> Laravel application found! Initializing Git repository..."
    if ! command -v git &> /dev/null; then
        echo " [ERROR] 'git' command not found on this server. Please install git or ask host to enable it."
        exit 1
    fi

    REPO_URL="https://github.com/vamsidasarik3/bond.git"
    git init
    git remote add origin "$REPO_URL" 2>/dev/null || git remote set-url origin "$REPO_URL"
    echo " -> Fetching latest code from $REPO_URL..."
    git fetch origin main
    echo " -> Connecting branch to origin/main..."
    git checkout -f -B main origin/main
    echo " [SUCCESS] Git repository initialized and connected to GitHub!"
    echo ""
fi

# Detect current branch (default to main)
BRANCH=$(git rev-parse --abbrev-ref HEAD 2>/dev/null || echo "main")
if [ -z "$BRANCH" ] || [ "$BRANCH" = "HEAD" ]; then
    BRANCH="main"
fi

echo " Target Branch : origin/$BRANCH"
echo ""

# Always bring application back online if script exits or encounters an error
trap 'php artisan up 2>/dev/null || true' EXIT

# 2. Put application into Maintenance Mode (graceful)
echo " [1/7] Putting application in maintenance mode..."
if [ -f "artisan" ]; then
    php artisan down || true
fi

# 3. Pull latest changes from Git (force-clean any untracked files that block the merge)
echo ""
echo " [2/7] Pulling latest updates from origin/$BRANCH..."
git fetch origin "$BRANCH"

# Remove any untracked files/dirs that would be overwritten by the incoming pull
echo " -> Cleaning untracked files that conflict with incoming changes..."
git clean -fd --dry-run 2>/dev/null || true
git clean -fd 2>/dev/null || true

# Hard-reset to match origin exactly (no merge conflicts, no untracked collisions)
git reset --hard "origin/$BRANCH"

# CRITICAL: Ensure root .htaccess does NOT exist (HestiaCP requires .htaccess only in public_html)
rm -f .htaccess 2>/dev/null || true

# 4. Install / Update Composer dependencies (production optimized)
echo ""
echo " [3/7] Optimizing Composer dependencies for production..."
if command -v composer &> /dev/null; then
    composer install --no-dev --prefer-dist --optimize-autoloader --no-interaction
else
    echo " [NOTE] 'composer' command not in PATH, skipping composer install."
fi

# 5. Run Database Migrations
echo ""
echo " [4/7] Running database migrations..."
php artisan migrate --force

# Optional Plot Seeder (Run with '--seed' flag or if database is fresh)
if [[ "$*" == *"--seed"* ]]; then
    echo " Running PlotSeeder (158 authentic plots)..."
    php artisan db:seed --class=PlotSeeder --force
fi

# 6. Ensure Storage Symlink
echo ""
echo " [5/7] Ensuring storage symlink..."
mkdir -p storage/app/public
if [ ! -L "public_html/storage" ]; then
    ln -s "$(pwd)/storage/app/public" "$(pwd)/public_html/storage" 2>/dev/null || php artisan storage:link 2>/dev/null || true
else
    echo " -> Storage symlink already exists."
fi

# 7. Clear & Optimize Laravel Caches for Production
echo ""
echo " [6/7] Building production caches (config, routes, views)..."
php artisan config:clear || true
php artisan route:clear || true
php artisan view:clear || true

php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

# Set permissions for web server
echo " Setting file permissions on storage and bootstrap/cache..."
chmod -R 775 storage bootstrap/cache 2>/dev/null || true

# 8. Bring Application back Online
echo ""
echo " [7/7] Bringing application back online..."
php artisan up || true

echo ""
echo "=========================================================="
echo " [SUCCESS] Deployment Completed Successfully!             "
echo " Current Commit : $(git rev-parse --short HEAD)           "
echo " Latest Message : $(git log -1 --pretty=%B | tr -d '\n')  "
echo " Status         : Live & Serving Traffic                  "
echo "=========================================================="
echo ""
echo " Optional Tip: To seed all 158 authentic layout plots on Live, run:"
echo " bash deploy-live-pull.sh --seed"
echo ""
