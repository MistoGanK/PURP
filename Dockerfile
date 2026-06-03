FROM php:8.2-fpm

# Instalar extensiones necesarias
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_mysql

# Copiar Composer oficial desde su imagen al entorno de ejecución de PHP
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Directorio de trabajo
WORKDIR /var/www

# Copiamos el archivo de dependencias antes para que se instalen al construir
COPY composer.json ./

# Ejecutar la instalación de dependencias (creará la carpeta /vendor automáticamente)
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Permisos para que el servidor web pueda leer los archivos
RUN chown -R www-data:www-data /var/www
