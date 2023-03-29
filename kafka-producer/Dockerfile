FROM php:7.4-fpm
RUN apt-get update && apt-get install -y\
    git \
     librdkafka-dev
RUN pecl install rdkafka-3.1.2 && docker-php-ext-enable rdkafka

COPY --from=composer:2.0.9 /usr/bin/composer /usr/bin/composer
