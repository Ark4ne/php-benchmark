#!/usr/bin/env bash

chmod 777 -R storage/*

composer install --no-dev --optimize-autoloader
php luxury optimize --memory