#!/usr/bin/env bash
# exit on error
set -o errexit

# Install Composer dependencies
composer install --no-dev --optimize-autoloader

# Install NPM dependencies and build assets
npm ci
npm run build

# Clear and cache config
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Cache config for production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run database migrations
php artisan migrate --force

# Create storage link
php artisan storage:link
