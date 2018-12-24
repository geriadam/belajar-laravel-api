<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Model\Product::class, function (Faker\Generator $faker) {
    static $password;

    return [
		'name'     => $faker->word,
		'detail'   => $faker->paragraph,
		'price'    => $faker->numberBetween(100,1000),
		'stock'    => $faker->randomDigit,
		'discount' => $faker->numberBetween(2,30),
    ];
});
