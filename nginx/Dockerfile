FROM nginx:latest

# Copy cấu hình Nginx
COPY nginx.conf /etc/nginx/nginx.conf

# Copy thư mục chứa ảnh
COPY ./images /usr/share/nginx/html/images

EXPOSE 80
