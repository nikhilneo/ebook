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

$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 1004),
        'status' => $faker->randomElement($array = array ('Placed', 'Confirmed', 'Delivered', 'Canceled')),
        'grand_total' => $faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 1000),
    ];
});