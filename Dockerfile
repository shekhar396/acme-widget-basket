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

# Copy the entry point script and set execution permissions
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Expose port for the PHP built-in server
EXPOSE 8000

# Use the entry point script
ENTRYPOINT ["entrypoint.sh"]
