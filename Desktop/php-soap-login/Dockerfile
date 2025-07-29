FROM php:8.1-apache
RUN docker-php-ext-install soap
COPY ./www /var/www/html
COPY ./wsdl /var/www/html/wsdl
