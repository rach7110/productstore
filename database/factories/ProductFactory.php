<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'      => $faker->name,
        'sku'       => $faker->unique()->word(),
        'quantity'  => $faker->numberBetween(1,20),
        'price'     => $faker->randomNumber(2)
    ];
});
