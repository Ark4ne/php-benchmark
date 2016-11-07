#!/usr/bin/env bash

chmod 777 -R storage/*

composer install --no-dev --optimize-autoloader

php artisan optimize --force
php artisan config:cache
php artisan route:cache