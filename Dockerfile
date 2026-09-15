# Render: imagen base con Apache y PHP 8.2
FROM php:8.2-apache

WORKDIR /var/www/html

# Copia todo el sitio
COPY . .

# Activa mod_rewrite (Redirecciones y URLs limpias)
RUN a2enmod rewrite

# Puerto por defecto (Render lo asigna con la variable PORT)
EXPOSE 80

# Punto de entrada que adapta Apache al puerto de Render
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

ENTRYPOINT ["docker-entrypoint.sh"]