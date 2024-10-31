FROM php:8.2-fpm

USER root

RUN apt-get update && apt-get install -y \
    libfreetype-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && apt-get clean && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

COPY . /var/www/procontext-test/
WORKDIR /var/www/procontext-test/

RUN usermod -u 1000 www-data && groupmod -g 1000 www-data
RUN chgrp -R www-data storage bootstrap/cache
RUN chmod -R 777 storage bootstrap/cache

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

EXPOSE 9000
CMD composer install ; \
    php artisan migrate ; \
    php-fpm
