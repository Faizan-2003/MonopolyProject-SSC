# Use the official PHP image with FPM
FROM php:fpm

# Install PDO and MySQL extensions
RUN docker-php-ext-install pdo pdo_mysql

# Copy Composer from the Composer image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install Apache
RUN apt-get update && apt-get install -y apache2 libapache2-mod-fcgid

# Enable FPM and rewrite modules
RUN a2enmod rewrite
RUN a2enmod proxy_fcgi setenvif
RUN a2enconf php-fpm

# Set the working directory
WORKDIR /var/www/html

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html

# Expose port 80
EXPOSE 80

# Start Apache in the foreground
CMD ["apachectl", "-D", "FOREGROUND"]
