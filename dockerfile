FROM php:8.4-apache

RUN apt-get update 
RUN pecl install -f xdebug

ARG HOST_ID
RUN groupadd -g "$HOST_ID" geopagos-test \
    && useradd -g "$HOST_ID" -u "$HOST_ID" -d /var/www -s /bin/bash geopagos-test

RUN echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)\n\n\
[xdebug]\n\
xdebug.mode=debug\n\
xdebug.start_with_request=yes" > /usr/local/etc/php/conf.d/xdebug.ini;

RUN chmod g+w /var/www
USER geopagos-test:geopagos-test
EXPOSE 80
VOLUME /var/www
WORKDIR /var/www/html
