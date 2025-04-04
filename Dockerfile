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

# Tạo thư mục ảnh và phân quyền cho www-data
RUN mkdir -p /usr/share/nginx/html/images/product \
    && chown -R www-data:www-data /usr/share/nginx/html/images \
    && chmod -R 755 /usr/share/nginx/html/images

# Tăng giới hạn upload file (tùy chọn)
RUN echo "upload_max_filesize = 10M" > /usr/local/etc/php/conf.d/uploads.ini \
    && echo "post_max_size = 10M" >> /usr/local/etc/php/conf.d/uploads.ini

# Mở cổng
EXPOSE 80

# Chạy cả Nginx và PHP-FPM
CMD ["sh", "-c", "php-fpm -D && nginx -g 'daemon off;'"]