#!/bin/sh

service postgresql restart
sudo -u postgres psql -c "ALTER USER postgres WITH PASSWORD '12345678';"
sudo -u postgres psql -c "create database test_task_coordinates;"

php composer_2.phar update
php composer_2.phar dump-autoload

chmod -R 777 storage/logs/
php artisan config:clear
php artisan route:clear
php artisan cache:clear
php artisan config:cache
php artisan migrate
php artisan passport:install
php artisan passport:keys

set -e

exec apache2-foreground
