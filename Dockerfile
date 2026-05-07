FROM php:8.2-fpm

# Instalar extensiones necesarias para MariaDB/MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Directorio de trabajo
WORKDIR /var/www

# Permisos para que el servidor web pueda leer los archivos
RUN chown -R www-data:www-data /var/www
