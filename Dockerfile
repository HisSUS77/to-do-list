# Use official PHP-Apache image
FROM php:8.2-apache

# Install PDO MySQL driver
RUN docker-php-ext-install pdo pdo_mysql

# Copy app files into the container
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html

# Give ownership to Apache user
RUN chown -R www-data:www-data /var/www/html

# Expose Apache port
EXPOSE 80
