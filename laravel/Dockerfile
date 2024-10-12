# Use uma imagem oficial do PHP com Apache ou CLI
FROM php:8.2-fpm

# Instale as extensões PHP necessárias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Configure o diretório de trabalho
WORKDIR /var/www/html

# Instale o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
