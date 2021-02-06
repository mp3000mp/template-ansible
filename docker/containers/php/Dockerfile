FROM php:7.3-fpm

#RUN echo "en_US.UTF-8 UTF-8" > /etc/locale.gen && \
#    echo "fr_FR.UTF-8 UTF-8" >> /etc/locale.gen && \
#    locale-gen

RUN curl -sSk https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install pdo_mysql

WORKDIR /var/www/html
