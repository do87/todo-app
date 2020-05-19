FROM php:7.4.5-fpm-alpine3.11
ADD ./app /app
RUN docker-php-ext-install mysqli