# Use the official PHP image
FROM php:8.1.6-apache

# Install necessary PHP extensions and tools
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql

# Copy project files to the Apache document root
COPY . /var/www/html/

# Set the working directory
WORKDIR /var/www/html/

# Expose port 80 for the web server
EXPOSE 80
