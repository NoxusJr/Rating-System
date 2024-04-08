FROM php:8-apache

ENV DB_HOST lenicio.dev
ENV DB_USER hg5pss68_mengao
ENV DB_NAME hg5pss68_mengao
ENV DB_PASS 10203040@

RUN docker-php-ext-install pdo_mysql

RUN a2enmod rewrite

RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

EXPOSE 80

COPY . /var/www/html/
