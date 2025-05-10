FROM php:8.2-fpm

COPY php.ini /usr/local/etc/php/conf.d/
WORKDIR /var/www/html
# /var/lib/apt/lists ディレクトリのパーミッションを変更
RUN chmod -R 755 /var/lib/apt/lists
RUN apt-get update && apt-get install -y libzip-dev zip && docker-php-ext-install pdo_mysql zip