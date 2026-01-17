# Utilisation d'une image PHP très légère
FROM php:8.2-fpm-alpine

# Installation des extensions minimales pour Laravel
RUN docker-php-ext-install pdo pdo_mysql

# On se place dans le dossier de l'app
WORKDIR /var/www

# On copie uniquement les fichiers nécessaires
COPY . /var/www

# Droits d'accès
RUN chown -R www-data:www-data /var/www/storage

EXPOSE 9000
CMD ["php-fpm"]
