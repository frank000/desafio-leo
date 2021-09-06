FROM php:7.2-apache
RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN chmod -R 755 /var/www

RUN mkdir /var/www/html/imagens
RUN chmod -R 777 /var/www/html/imagens

