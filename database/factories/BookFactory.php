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

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'publisher' => $faker->randomElement($array = array ('Unknown','Bansal Publication','BB Publication', 'Addison-Wesley')),
        'author' => $faker->name, 
        'eddition' => '1st Edition', 
        'publish_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000),
        'quantity' => $faker->numberBetween($min = 10, $max = 900),
        'total' => $faker->numberBetween($min = 10, $max = 900),
        'admin_id' => $faker->numberBetween($min = 1, $max = 4),
    ];
});