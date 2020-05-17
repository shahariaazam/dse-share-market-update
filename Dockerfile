# Minimal base image for PHP7.2
FROM php:7.2-cli-alpine

# Copy source codes
COPY . /usr/src/bd-stock-price

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

WORKDIR /usr/src/bd-stock-price

# Install composer dependencies
RUN composer install --no-dev

# Set execution permission to ./bin/stock
RUN chmod a+x ./bin/stock