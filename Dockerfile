FROM php:8.2-apache

# Enable Apache modules
RUN a2enmod rewrite

# Set the working directory
WORKDIR /var/www/html

# Copy the PHP files to the container
COPY . /var/www/html

# Expose port 80
EXPOSE 80