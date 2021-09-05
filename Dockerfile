FROM php:7.2-apache
RUN docker-php-ext-install mysqli

RUN chmod -R 755 /var/www