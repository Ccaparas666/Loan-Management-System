# Use PHP 8.1 image
FROM php:8.1-fpm

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy application files
COPY . .

# Generate application key
RUN cp .env.example .env && php artisan key:generate

# Install PHP dependencies
RUN COMPOSER_MEMORY_LIMIT=-1 composer install --no-dev --optimize-autoloader --no-plugins --no-scripts

# Install Node.js and npm (assuming you need it for npm install)
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash - && apt-get install -y nodejs

# Install npm dependencies
RUN npm install

# Run database migrations
RUN php artisan migrate

# Seed the database
RUN php artisan db:seed --class=UsersTableSeeder

# Expose port
EXPOSE 8000

# Command to start the server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
