#!/bin/sh

# Wait a moment for volumes to be fully mounted
sleep 1

# Ensure directories exist and fix permissions for mounted volumes
mkdir -p /var/www/html/storage/framework/cache/data
mkdir -p /var/www/html/storage/framework/sessions
mkdir -p /var/www/html/storage/framework/views
mkdir -p /var/www/html/storage/logs
mkdir -p /var/www/html/bootstrap/cache

# Fix ownership and permissions
chown -R www-data:www-data /var/www/html/storage
chown -R www-data:www-data /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage
chmod -R 775 /var/www/html/bootstrap/cache

# Specifically ensure session directory is writable
chmod 775 /var/www/html/storage/framework/sessions
chmod 775 /var/www/html/storage/framework/cache/data
chmod 775 /var/www/html/storage/logs

# Fix database permissions (critical for SQLite)
if [ -d /var/www/html/database ]; then
    chown -R www-data:www-data /var/www/html/database
    chmod 775 /var/www/html/database
    if [ -f /var/www/html/database/db.sql ]; then
        chmod 664 /var/www/html/database/db.sql
    fi
fi

echo "✅ Permissions set for storage, bootstrap/cache, and database directories."

# Start PHP-FPM and Nginx
php-fpm -D && nginx -g 'daemon off;'
