FROM php:7-alpine

RUN docker-php-ext-install pdo pdo_mysql mysqli

WORKDIR /app

ENV PATH /app/vendor/bin:$PATH

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY composer.json .
COPY composer.lock .

RUN composer install

COPY . .

EXPOSE 8080
