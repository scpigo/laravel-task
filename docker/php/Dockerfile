FROM php:8.2-fpm

RUN apt-get update \
  && apt-get install -y \
             vim \
             libfreetype6-dev \
             libmcrypt-dev \
             zlib1g-dev \
             libxml2-dev \
             libzip-dev \
             libonig-dev \
             libcurl4-openssl-dev \
             pkg-config \
             libpq-dev

RUN docker-php-ext-install soap \
  && docker-php-ext-install mysqli \
  && docker-php-ext-install pdo_mysql \
  && docker-php-ext-install intl \
  && docker-php-ext-install zip \
  && docker-php-source delete

ENV COMPOSER_HOME=/composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN chown -R www-data:www-data /composer
