# Dockerfile - PHP Web Server
FROM php:8.1-apache

# Cài đặt các extensions cần thiết
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Kích hoạt module mod_rewrite
RUN a2enmod rewrite

# Copy mã nguồn vào container
WORKDIR /app
COPY ./src /app

# Phân quyền cho thư mục chứa mã nguồn
RUN chown -R www-data:www-data /app

# Cấu hình ServerName để tránh lỗi
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Chạy Apache trên cổng do Railway cung cấp
CMD ["apachectl", "-D", "FOREGROUND"]