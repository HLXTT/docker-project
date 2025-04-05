FROM php:8.1-fpm

# Cài Nginx
RUN apt-get update && apt-get install -y nginx \
    && apt-get install -y libpng-dev libjpeg-dev \
    && docker-php-ext-install pdo_mysql gd

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Sao chép code PHP từ thư mục src/ vào /var/www/html/
COPY src/ /var/www/html/

# Thay đổi quyền cho thư mục /var/www/html/ và tất cả các file bên trong
RUN chown -R www-data:www-data /var/www/html/ \
    && chmod -R 755 /var/www/html/

# Sao chép cấu hình Nginx vào container
COPY nginx.conf /etc/nginx/nginx.conf

# Tạo thư mục ảnh và phân quyền cho www-data
RUN mkdir -p /usr/share/nginx/html/images \
    && chown -R www-data:www-data /usr/share/nginx/html/images \
    && chmod -R 755 /usr/share/nginx/html/images

# Tăng giới hạn upload file
RUN echo "upload_max_filesize = 10M" > /usr/local/etc/php/conf.d/uploads.ini \
    && echo "post_max_size = 10M" >> /usr/local/etc/php/conf.d/uploads.ini

# Mở cổng 8080
EXPOSE 8080

# Chạy cả Nginx và PHP-FPM
CMD ["sh", "-c", "chown -R www-data:www-data /usr/share/nginx/html/images && chmod -R 755 /usr/share/nginx/html/images && php-fpm -D && nginx -g 'daemon off;'"]
