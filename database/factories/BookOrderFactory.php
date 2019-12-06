<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Book_Order::class, function (Faker $faker) {
    return [
        'order_id' => $faker->numberBetween($min = 17, $max = 1014),
        'book_id' => $faker->numberBetween($min = 1, $max = 1017),
        'quantity' => $faker->numberBetween($min = 1, $max = 10),
    ];
});