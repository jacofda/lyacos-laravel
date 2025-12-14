FROM php:8.2-fpm

# Installa dipendenze di sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    default-mysql-client

# Pulisci cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Installa estensioni PHP
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Installa Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Imposta working directory
WORKDIR /var/www

# Copia i file dell'applicazione
COPY . /var/www

# Copia composer.json e composer.lock
COPY composer.json composer.lock /var/www/

# Installa dipendenze PHP
RUN composer install --no-interaction --optimize-autoloader --no-dev --ignore-platform-reqs || \
    (composer install --no-interaction --optimize-autoloader --no-dev)

# Imposta permessi
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage \
    && chmod -R 755 /var/www/bootstrap/cache

# Copia e rendi eseguibile lo script di entrypoint
COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Esponi porta 9000 e avvia php-fpm
EXPOSE 9000
ENTRYPOINT ["docker-entrypoint.sh"]