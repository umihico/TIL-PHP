cd laravel-project/
composer install
vim .env # set database properly again
php artisan key:generate
php artisan cache:clear
php artisan serve # not required when appache helps
