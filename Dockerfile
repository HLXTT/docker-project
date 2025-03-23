# Sử dụng image PHP có Apache tích hợp sẵn
FROM php:8.1-apache

# Cài đặt các extension cần thiết cho PHP (ví dụ: MySQLi, PDO MySQL)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy toàn bộ mã nguồn vào thư mục gốc của Apache
COPY ./src/ /var/www/html/

# Phân quyền cho thư mục web
RUN chown -R www-data:www-data /var/www/html

# Mở cổng 80 để chạy Apache
EXPOSE 80
