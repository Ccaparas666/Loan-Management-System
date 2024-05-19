# Stage 1: Build Stage
FROM node:16 AS node_builder

# Set working directory for frontend
WORKDIR /app

# Copy frontend files
COPY LoanManagementSystem/package.json LoanManagementSystem/package-lock.json ./

# Install Node.js dependencies
RUN npm install

# Copy rest of the frontend files and build assets
COPY LoanManagementSystem .
RUN npm run build

# Stage 2: PHP Stage
FROM php:8.2.4-fpm

# Set working directory for Laravel project
WORKDIR /var/www/html/LoanManagementSystem

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    nginx

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy Laravel project files to the container
COPY LoanManagementSystem .

# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev

# Set correct permissions for storage and cache
RUN chown -R www-data:www-data storage bootstrap/cache

# Generate application key
RUN php artisan key:generate

# Copy nginx configuration file
COPY nginx.conf /etc/nginx/nginx.conf

# Expose port 80 for nginx
EXPOSE 80

# Start nginx and php-fpm
CMD service nginx start && php-fpm
