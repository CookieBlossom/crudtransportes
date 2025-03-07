FROM php:8.1-apache
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install pdo_mysql

RUN a2enmod rewrite
WORKDIR /var/www/html
COPY src/ /var/www/html/
EXPOSE 80
