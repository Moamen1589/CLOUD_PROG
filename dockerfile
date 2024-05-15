# Use an official PHP image as the base
FROM php:apache

# Install the mysqli extension
RUN docker-php-ext-install mysqli

# Set the working directory
WORKDIR /var/www/html

# Copy your PHP files into the container
COPY . .

# Command to run your PHP application
CMD ["php", "-S", "0.0.0.0:80"]
