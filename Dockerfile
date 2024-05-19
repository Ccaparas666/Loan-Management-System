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




# Copy project files to the container
COPY . .

# Change directory to Laravel project directory
WORKDIR /var/www/html/LoanMangementSystem








# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php", "artisan", "serve", "--host", "0.0.0.0"]


