#!/bin/bash

echo "Waiting for database to be ready..."
until mysql --skip-ssl -h"$DB_HOST" -u"$DB_USERNAME" -p"$DB_PASSWORD" "$DB_DATABASE" -e "SELECT 1" >/dev/null 2>&1; do
    echo "Database is unavailable - sleeping"
    sleep 2
done

echo "Database is ready!"

echo "Importing database dump..."
mysql --skip-ssl -h"$DB_HOST" -u"$DB_USERNAME" -p"$DB_PASSWORD" "$DB_DATABASE" < /var/www/lyacos-db.sql

echo "Database import completed!"

# Start php-fpm
exec php-fpm
