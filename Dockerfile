# Render: imagen base con Apache y PHP 8.2
FROM php:8.2-apache

WORKDIR /var/www/html

# Copia todo el sitio
COPY . .

# Activa mod_rewrite (Redirecciones y URLs limpias)
RUN a2enmod rewrite

# Render asigna el puerto 10000 por defecto en el plan gratuito.
# Configuramos Apache para que escuche ahí (evita scripts de arranque frágiles).
RUN sed -i "s/^Listen 80$/Listen 10000/" /etc/apache2/ports.conf && \
    sed -i "s|<VirtualHost \*:80>|<VirtualHost *:10000>|" /etc/apache2/sites-available/000-default.conf

EXPOSE 10000

# Apache se inicia con el CMD por defecto de la imagen (apache2-foreground)