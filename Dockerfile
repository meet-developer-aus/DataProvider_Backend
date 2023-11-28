# Use an official PHP runtime as a parent image
FROM php:8.2-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Install PHP extensions and other dependencies
RUN apt-get update && \
    apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Enable Apache modules
RUN a2enmod rewrite

# Copy the application code to the container
COPY . /var/www/html

# Install PHP dependencies
RUN composer install --no-interaction

# Set up Apache virtual host
COPY docker/vhost.conf /etc/apache2/sites-available/000-default.conf


# Expose port 80 to the outside world
EXPOSE 80

# Command to run the application
CMD ["apache2-foreground"]
