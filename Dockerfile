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
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy project files to the container
COPY . .

# Change directory to Laravel project directory
WORKDIR /var/www/html/LoanMangementSystem

# Install PHP dependencies
RUN composer clear-cache
RUN composer install --no-interaction --prefer-dist --optimize-autoloader --verbose

# Install Node.js dependencies
RUN npm install

# Build assets for development
RUN npm run dev

# Change directory back to Laravel project directory
WORKDIR /var/www/html/LoanMangementSystem

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
