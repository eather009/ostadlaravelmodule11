git clone git@github.com:eather009/ostadlaravelmodule11.git

composer install

<hr/>

## update .env
cp .env.example .env

and Update database settings

<hr/>

php artisan key:generate

mkdir -p storage/framework/cache

mkdir -p storage/framework/sessions

mkdir -p storage/framework/testing

mkdir -p storage/framework/views

chmod -R 775 storage

chmod -R 775 bootstrap/cache

php artisan migrate

npm install

npm run dev

php artisan serve
