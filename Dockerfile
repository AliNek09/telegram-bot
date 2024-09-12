FROM php:8.2-fpm-alpine as php

WORKDIR /var/www/html

RUN apk add --no-cache git curl libpng-dev libjpeg-turbo-dev libzip-dev \
    freetype-dev icu-dev libxml2-dev libxslt-dev \
    postgresql-dev postgresql-client \
    && docker-php-ext-configure gd --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql pdo_pgsql zip exif pcntl intl bcmath xml xsl opcache \
    && docker-php-ext-enable gd intl opcache

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /var/www/html

RUN composer install --no-dev --optimize-autoloader --no-interaction --no-plugins \
    && composer clear-cache

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

EXPOSE 9000

CMD ["php-fpm"]

