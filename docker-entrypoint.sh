#!/bin/sh
set -e

PORT="${PORT:-80}"

# Hace que Apache escuche en el puerto asignado por Render
sed -i "s/^Listen 80$/Listen $PORT/" /etc/apache2/ports.conf
sed -i "s|<VirtualHost \*:80>|<VirtualHost *:$PORT>|" /etc/apache2/sites-available/000-default.conf

# Arranca Apache en primer plano
exec apache2-foreground