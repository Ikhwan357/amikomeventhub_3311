#!/bin/bash

set -e

echo "Composer autoload..."
composer dump-autoload --optimize

echo "Storage link..."
php artisan storage:link || true

echo "Clear cache..."
php artisan optimize:clear

echo "Cache config..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Running migration..."
php artisan migrate --force

echo "Permission..."
chmod -R 775 storage bootstrap/cache

exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf