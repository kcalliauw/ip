FROM php:8.1-apache-bullseye
RUN mv /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini
RUN sed --in-place 's/ServerTokens OS/ServerTokens Prod/g' /etc/apache2/conf-enabled/security.conf
COPY php.ini /usr/local/etc/php/conf.d
COPY --chown=www-data:www-data index.php /var/www/html/