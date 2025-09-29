# Usa la imagen base de PHP con Apache
FROM php:8.0.9-apache

# Instala las extensiones de PHP necesarias, incluyendo pdo_mysql
RUN docker-php-ext-install pdo pdo_mysql

# Instalar GD y otras extensiones necesarias
RUN apt-get update && \
    apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd

# Habilita mod_rewrite si es necesario
RUN a2enmod rewrite

# Copia todo el contenido de tu proyecto al directorio raíz de Apache
COPY . /var/www/html/

# Establece permisos adecuados (opcional pero recomendado)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expone el puerto 80
EXPOSE 80

# Inicia Apache en primer plano
CMD ["apache2-foreground"]
