FROM php:7.4-fpm

# Install necessary PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Copy Composer from the Composer image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set the working directory
WORKDIR /var/www/html

# Copy the application code
COPY . /var/www/html

# Expose port 9000 for PHP-FPM
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]
