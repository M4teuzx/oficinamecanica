# Use a imagem PHP Apache
FROM php:7.4-apache

# Atualize e instale dependências
RUN apt-get update \
    && apt-get install -y \
        libzip-dev \
        zip \
        unzip \
        libonig-dev \
        libxml2-dev \
    && docker-php-ext-install pdo_mysql mysqli zip mbstring exif pcntl bcmath soap \
    && a2enmod rewrite

# Copie os arquivos do CodeIgniter para o contêiner
COPY . /var/www/html

# Defina o diretório de trabalho
WORKDIR /var/www/html

# Instale as dependências do Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader

# Copie o arquivo de configuração do Apache
COPY apache2.conf /etc/apache2/apache2.conf

# Exponha a porta 80
EXPOSE 80

# Inicie o servidor Apache
CMD ["apache2-foreground"]
