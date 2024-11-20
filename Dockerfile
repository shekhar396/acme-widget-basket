# Use an official PHP image as the base
FROM php:8.2-cli

# Set working directory
WORKDIR /var/www/html

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project files to the container
COPY . .

# Install project dependencies
RUN composer install

# Expose port for application (if using web server like Apache/Nginx)
EXPOSE 8000

# Set the entry point to PHP's built-in server (optional for testing)
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
