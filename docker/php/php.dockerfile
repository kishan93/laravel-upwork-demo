FROM php:8.2-fpm-alpine

ARG user
ARG uid

# install php pdo_mysql
RUN docker-php-ext-install pdo_mysql

#install php redis
RUN apk add --no-cache pcre-dev $PHPIZE_DEPS \
    && pecl install redis \
    && docker-php-ext-enable redis.so


#install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# permissions
RUN addgroup -g $uid -S $user && \
    adduser -u $uid -D -S -G $user $user && \
    addgroup $user www-data

# Set working directory
WORKDIR /var/www/html

USER $user

ENTRYPOINT ["php-fpm"]

