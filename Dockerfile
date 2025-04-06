FROM php:8.2-apache

# Instala dependências e extensões PHP
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql zip gd

# Habilita mod_rewrite e mod_autoindex (para listar diretórios)
RUN a2enmod rewrite autoindex

# Configuração para listar diretórios
RUN echo "Options +Indexes" >> /etc/apache2/apache2.conf
RUN echo "IndexOptions FancyIndexing VersionSort NameWidth=* HTMLTable" >> /etc/apache2/apache2.conf

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Cria um usuário com permissões adequadas
RUN useradd -m devuser && \
    chown -R devuser:devuser /var/www/html

# Permissões para desenvolvimento
RUN chmod -R 777 /var/www/html

FROM php:8.2-apache

# Instala dependências
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip \
    && docker-php-ext-install pdo_mysql zip

# Habilita módulos Apache
RUN a2enmod rewrite

# Permissões para desenvolvimento
RUN chmod -R 777 /var/www/html

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html