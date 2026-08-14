FROM php:8.3-cli-alpine

RUN apk add --no-cache \
    bash \
    curl \
    unzip \
    libzip \
    libpq \
    icu-libs \
    oniguruma \
    libxml2 \
    $PHPIZE_DEPS \
    postgresql-dev \
    libzip-dev \
    icu-dev \
    oniguruma-dev \
    libxml2-dev \
    mariadb-dev \
    sqlite-dev \
    && docker-php-ext-install -j$(nproc) \
        pdo pdo_mysql pdo_pgsql pdo_sqlite \
        mbstring bcmath intl zip opcache xml \
    && apk del --purge $PHPIZE_DEPS postgresql-dev libzip-dev icu-dev oniguruma-dev libxml2-dev mariadb-dev sqlite-dev \
    && rm -rf /var/cache/apk/* /tmp/*

RUN echo 'memory_limit = 512M' > /usr/local/etc/php/conf.d/99-doppar.ini \
    && echo 'display_errors = On' >> /usr/local/etc/php/conf.d/99-doppar.ini \
    && echo 'log_errors = On' >> /usr/local/etc/php/conf.d/99-doppar.ini \
    && echo 'error_log = /app/storage/logs/php-errors.log' >> /usr/local/etc/php/conf.d/99-doppar.ini

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1
ENV COMPOSER_HOME=/tmp/composer

WORKDIR /app

COPY composer.json composer.lock* ./
RUN composer install --no-interaction --prefer-dist --no-progress --no-scripts \
    && composer clear-cache

COPY . .

RUN chmod +x pool docker/entrypoint.sh

EXPOSE 8000

ENTRYPOINT ["docker/entrypoint.sh"]
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public", "server.php"]
