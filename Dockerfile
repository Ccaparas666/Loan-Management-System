# Use the official PHP 8.2 image with FPM
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libpq-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    nodejs \
    npm

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql gd

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy application code
COPY . .

# Copy the .env file and set up application key


# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Install NPM dependencies
RUN npm install

# Build assets using Vite
RUN npm run build

# Run migrations and seed database
RUN php artisan migrate --force && php artisan db:seed --class=UsersTableSeeder --force

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
