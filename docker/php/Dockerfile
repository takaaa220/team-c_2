FROM php:7-fpm

RUN apt-get update && apt-get install -y \
  git unzip \
  && docker-php-ext-install pdo pdo_mysql mysqli

WORKDIR /var/www/html

ENV PATH /var/www/html/vendor/bin:$PATH

EXPOSE 8080

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY composer.json /tmp/composer.json
COPY composer.lock /tmp/composer.lock

ENV COMPOSER_ALLOW_SUPERUSER 1
RUN composer install --no-scripts --no-autoloader -d /tmp

COPY . .

RUN mv -n /tmp/vendor ./ \
  && composer dump-autoload
