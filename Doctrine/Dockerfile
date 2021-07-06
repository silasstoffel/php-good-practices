
## https://hub.docker.com/_/php?tab=description&page=1&ordering=last_updated

FROM php:8.0.7-apache

ENV APACHE_DOCUMENT_ROOT /var/www/public/

WORKDIR /var/www

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf

RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libzip-dev \
        libsodium-dev

# https://github.com/mlocati/docker-php-extension-installer
RUN docker-php-ext-install zip sodium

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
