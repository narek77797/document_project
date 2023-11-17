FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl

RUN apt-get update && apt-get install -y libpq-dev libzip-dev libgd-dev && docker-php-ext-install pdo pdo_pgsql pdo_mysql gd bcmath zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN groupadd -g 1000 appuser && \
    useradd -u 1000 -ms /bin/bash -g appuser appuser

USER appuser

WORKDIR /var/www

COPY --chown=appuser:appuser . /var/www

RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache

EXPOSE 9000

CMD ["php-fpm"]
