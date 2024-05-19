# Stage 1: Install PHP and Composer dependencies
FROM php:8.2.4-fpm AS php_base

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

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy only Composer files
COPY composer.json composer.lock ./

# Install PHP dependencies
RUN composer clear-cache
RUN composer install --no-interaction --prefer-dist --optimize-autoloader --verbose

# Stage 2: Install Node.js dependencies and build assets
FROM node:16 AS node_base

# Set working directory for frontend
WORKDIR /var/www/html/LoanMangementSystem/frontend

# Copy frontend files
COPY ./frontend/package.json ./frontend/package-lock.json ./

# Install Node.js dependencies
RUN npm install

# Copy frontend source code
COPY ./frontend .

# Build assets for development
RUN npm run dev

# Stage 3: Final stage
FROM php_base

# Copy project files including PHP and Node.js dependencies
COPY . .

# Change directory to Laravel project directory
WORKDIR /var/www/html/LoanMangementSystem

# Copy built assets from previous stage
COPY --from=node_base /var/www/html/LoanMangementSystem/frontend/public ./public

# Generate application key
RUN php artisan key:generate

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php", "artisan", "serve", "--host", "0.0.0.0"]
