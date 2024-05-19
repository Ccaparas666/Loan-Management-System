# Use the official PHP image as the base image
FROM php:8.2.4-fpm

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip

# Install Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash - && \
    apt-get install -y nodejs

# Install npm
RUN npm install -g npm@latest

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy project files to the container
COPY . .

# Change directory to Laravel project directory
WORKDIR /var/www/html/LoanMangementSystem

# Install PHP dependencies
RUN composer clear-cache
RUN composer install --no-interaction --prefer-dist --optimize-autoloader --verbose

# Change directory to frontend directory
WORKDIR /var/www/html/LoanMangementSystem/frontend

# Install Node.js dependencies
RUN npm install

# Change directory back to Laravel project directory
WORKDIR /var/www/html/LoanMangementSystem

# Build assets for development
RUN npm run dev

# Generate application key
RUN php artisan key:generate

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
