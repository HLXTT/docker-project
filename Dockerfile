FROM php:8.1-apache

# Cài đặt các extensions cần thiết
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Kích hoạt module mod_rewrite
RUN a2enmod rewrite

# Copy mã nguồn vào container
COPY ./src /var/www/html

# Phân quyền cho thư mục chứa mã nguồn
RUN chown -R www-data:www-data /var/www/html

# Cấu hình ServerName để tránh lỗi
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Expose cổng 80
EXPOSE 80

# Start Apache
CMD ["apachectl", "-D", "FOREGROUND"]