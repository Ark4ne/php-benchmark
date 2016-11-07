#!/usr/bin/env bash

echo "Deploy nginx conf"
cp /etc/nginx/sites-available/default /etc/nginx/sites-available/default.old
cp ./php-benchmark/config/nginx-site-available /etc/nginx/sites-available/default

echo "Deploy php7.0-fpm conf"
cp /etc/php/7.0/fpm/pool.d/www.conf /etc/php/7.0/fpm/pool.d/www.conf.old
cp ./php-benchmark/config/php-fpm-www.conf /etc/php/7.0/fpm/pool.d/www.conf

echo "Deploy opcache.ini"
cp /etc/php/7.0/mods-available/opcache.ini /etc/php/7.0/mods-available/opcache.ini.old
cp ./php-benchmark/config/10-opcache.ini /etc/php/7.0/mods-available/opcache.ini

service nginx restart
service php7.0-fpm restart
