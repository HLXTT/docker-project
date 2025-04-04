FROM php:8.1-fpm

# Cài Nginx
RUN apt-get update && apt-get install -y nginx \
    && apt-get install -y libpng-dev libjpeg-dev \
    && docker-php-ext-install pdo_mysql gd

# Sao chép code PHP
COPY php/ /var/www/
RUN chmod -R 755 /var/www

# Sao chép cấu hình Nginx
COPY nginx.conf /etc/nginx/nginx.conf

# Tạo thư mục ảnh
RUN mkdir -p /usr/share/nginx/html/images
RUN chmod -R 755 /usr/share/nginx/html/images
COPY images/* /usr/share/nginx/html/images/  

# Định nghĩa volume cho ảnh
VOLUME /usr/share/nginx/html/images

# Mở cổng
EXPOSE 80

# Chạy cả Nginx và PHP-FPM
CMD ["sh", "-c", "php-fpm -D && nginx -g 'daemon off;'"]