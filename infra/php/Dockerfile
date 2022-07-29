FROM php:8.1-fpm-buster

ENV COMPOSER_ALLOW_SUPERUSER=1 \
  COMPOSER_HOME=/composer

COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer

RUN apt-get update && apt-get -y install libpq-dev && apt-get install -y \
   zip \
   unzip
RUN apt-get -y install libzip-dev
RUN docker-php-ext-install zip
# pdo_mysql（mysqlのドライバ）をインストールする
RUN docker-php-ext-install pdo_mysql

COPY ./php.ini /usr/local/etc/php/php.ini

WORKDIR /data
