FROM php:7.4-apache

# Instala extensões do PHP
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Habilita módulos do Apache
RUN a2enmod rewrite

# Copia a configuração do Apache
COPY docker/apache/000-default.conf /etc/apache2/sites-available/
RUN a2ensite 000-default.conf