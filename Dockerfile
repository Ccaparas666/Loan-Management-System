# Use PHP 8.2 base image with necessary extensions
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy application code
COPY . .

# Set up environment variables
ENV APP_NAME=Laravel
ENV APP_ENV=local
ENV APP_KEY=base64:E41AqXxYaos1AwXjjk2UDJd/YAxc5B1N1FcoN10rw2U=
ENV APP_DEBUG=true
ENV APP_URL=http://localhost
ENV LOG_CHANNEL=stack
ENV LOG_DEPRECATIONS_CHANNEL=null
ENV LOG_LEVEL=debug

# Database configuration
ENV DB_CONNECTION=pgsql
ENV DB_HOST=dpg-cp502d779t8c73emekvg-a
ENV DB_PORT=5432
ENV DB_DATABASE=loandb_m271
ENV DB_USERNAME=loandb_m271_user
ENV DB_PASSWORD=PGkYqjFov1NfYsk5PMZLlIOoMNaQWNkN

# Mail configuration
ENV MAIL_MAILER=smtp
ENV MAIL_HOST=smtp.gmail.com
ENV MAIL_PORT=587
ENV MAIL_USERNAME=temporary1469@gmail.com
ENV MAIL_PASSWORD=bqaljttxnhnzodbz
ENV MAIL_ENCRYPTION=ssl
ENV MAIL_FROM_ADDRESS="temporary1469@gmail.com"
ENV MAIL_FROM_NAME="temporary1469@gmail.com"

# Other Laravel environment variables
ENV BROADCAST_DRIVER=log
ENV CACHE_DRIVER=file
ENV FILESYSTEM_DISK=local
ENV QUEUE_CONNECTION=sync
ENV SESSION_DRIVER=file
ENV SESSION_LIFETIME=120

# Install PHP dependencies
RUN composer install

# Generate application key
RUN cp .env.example .env && php artisan key:generate

# Expose port 8000 and start the application
EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
