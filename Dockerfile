FROM php:8.2-fpm-alpine as php

WORKDIR /app

RUN apk add --no-cache git curl libpng-dev libjpeg-turbo-dev libzip-dev \
    && docker-php-ext-configure gd --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip exif pcntl \
    && docker-php-ext-enable gd


RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction --no-plugins

RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache

EXPOSE 9000

CMD ["php-fpm"]
