------------------------------------------------------------

git clone https://github.com/adil-zero-one/apiVideoJoc.git

cd apiVideoJoc

cp .env.example .env

composer install

php artisan key:generate

php artisan migrate:fresh --seed

php artisan serve

------------------------------------------------------------
