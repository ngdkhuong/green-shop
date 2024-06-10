FROM php:8.1.6-apache
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql mysqli zip
RUN a2enmod rewrite
WORKDIR /var/www/html
COPY . /var/www/html/
RUN chown -R www-data:www-data /var/www/html
EXPOSE 80
RUN curl -o /var/www/html/phpmyadmin.zip https://files.phpmyadmin.net/phpMyAdmin/5.2.0/phpMyAdmin-5.2.0-all-languages.zip \
    && unzip /var/www/html/phpmyadmin.zip -d /var/www/html/ \
    && mv /var/www/html/phpMyAdmin-5.2.0-all-languages /var/www/html/phpmyadmin \
    && rm /var/www/html/phpmyadmin.zip
CMD ["apache2-foreground"]
