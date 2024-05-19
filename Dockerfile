# Use PHP 8.2 base image
FROM php:8.2

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy the entire Laravel application directory into the container
COPY . .

# Set up environment variables
ENV APP_NAME=Laravel
ENV APP_ENV=local
# Add other environment variables as needed...

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-plugins --no-scripts

# Generate application key
RUN php artisan key:generate

# Expose port (if needed)
EXPOSE 8000

# Start the Laravel application
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
