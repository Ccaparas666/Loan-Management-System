# Stage 1: Build Stage
FROM node:16 AS node_builder

# Set working directory
WORKDIR /app

# Copy frontend files
COPY package.json package-lock.json ./

# Install Node.js dependencies
RUN npm install

# Copy rest of the frontend files and build assets
COPY . .
RUN npm run build

# Stage 2: PHP Stage
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
    nginx

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy project files to the container
COPY . .

# Copy built assets from the previous stage
COPY --from=node_builder /app/public /var/www/html/public

# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev

# Set correct permissions for storage and cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Generate application key
RUN php artisan key:generate

# Copy nginx configuration file
COPY ./nginx/nginx.conf /etc/nginx/nginx.conf

# Expose port 80 for nginx
EXPOSE 80

# Start nginx and php-fpm
CMD service nginx start && php-fpm
