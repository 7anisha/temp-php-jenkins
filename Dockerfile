FROM php:7.4-apache
COPY . /var/www/html/
RUN docker-php-ext-install pdo pdo_mysql mysqli && docker-php-ext-enable pdo pdo_mysql mysqli
EXPOSE 80

# Install PHP mysqli extension
# RUN docker-php-ext-install mysqli
