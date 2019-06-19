# Installation:

From the command line:
run `git clone https://github.com/rach7110/productstore` 

run `composer install`

run `php artisan key:generate`

run `cp .env.example .env`


Open the .env file and update your database credentials.

run `php artisan migrate --seed`

The API endpoints can be reached from these URLs:
* products
* products/{id}
* sync
