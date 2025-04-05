FROM php:8.1-fpm

RUN apt-get update && apt-get install -y nginx libpng-dev libjpeg-dev \
    && docker-php-ext-install pdo_mysql gd mysqli && docker-php-ext-enable mysqli

# Copy source code
COPY src/ /var/www/html/

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

COPY nginx.conf /etc/nginx/nginx.conf

EXPOSE 8080

CMD ["sh", "-c", "php-fpm -D && nginx -g 'daemon off;'"]
