FROM php:8.2-fpm-alpine

# Set working directory
WORKDIR /var/www/html

# Install system dependencies and PHP extensions
RUN apk add --no-cache \
    nginx \
    curl \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    oniguruma-dev \
    libzip-dev \
    zip \
    unzip \
    sqlite \
    sqlite-dev \
    bash \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
    pdo \
    pdo_sqlite \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy composer files first for better layer caching
COPY composer.json composer.lock /var/www/html/

# Create required directories before composer install
RUN mkdir -p storage/framework/cache/data \
    && mkdir -p storage/framework/sessions \
    && mkdir -p storage/framework/views \
    && mkdir -p storage/logs \
    && mkdir -p bootstrap/cache \
    && mkdir -p database/seeds \
    && mkdir -p database/factories

# Install composer dependencies (cached if composer files unchanged)
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts --no-ansi

# Copy entrypoint script BEFORE copying application files
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Copy nginx configuration
COPY nginx.conf /etc/nginx/http.d/default.conf

# Copy application files
COPY . /var/www/html

# Fix git ownership issue for composer
RUN git config --global --add safe.directory /var/www/html

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database
RUN chmod 664 /var/www/html/database/db.sql


# Run post-install scripts now that all files are present
RUN composer dump-autoload --optimize --no-dev --no-scripts

# Expose port 80
EXPOSE 80

# Use entrypoint script to fix permissions at runtime
ENTRYPOINT ["docker-entrypoint.sh"]