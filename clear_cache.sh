cd exercise
composer install -vvv --prefer-dist
php artisan key:generate
php artisan cache:clear
php artisan config:clear
php artisan config:cache
php artisan view:clear
php artisan migrate