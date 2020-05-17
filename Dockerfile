FROM php:7.2-alpine

RUN set -xe \
    && apk add --no-cache --update --virtual .phpize-deps $PHPIZE_DEPS \
    && apk add git \
    && rm -rf /usr/share/php \
    && rm -rf /tmp/* \
    && apk del  .phpize-deps

RUN git clone -b development https://github.com/shahariaazam/DSE-Share-Market-Update.git /usr/src/bd-stock-exchange
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

WORKDIR /usr/src/bd-stock-exchange

RUN composer install --no-dev