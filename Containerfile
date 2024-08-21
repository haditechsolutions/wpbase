FROM ghcr.io/cwm360/wordpress:php8.3-apache

WORKDIR /var/www/html

COPY ./extensions/* /usr/local/lib/php/extensions/no-debug-non-zts-20230831/ 

COPY ./confs/* /usr/local/etc/php/conf.d/
