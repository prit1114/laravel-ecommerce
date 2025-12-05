FROM php:8.1-fpm

RUN apt-get update && apt-get install -y             git zip unzip libpq-dev libzip-dev libonig-dev libpng-dev libjpeg-dev libfreetype6-dev             curl

RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . /var/www/html

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache || true

EXPOSE 9000
CMD ["php-fpm"]
