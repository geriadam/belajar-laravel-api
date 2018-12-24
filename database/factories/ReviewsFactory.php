<?php
use App\Model\Product;

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
$factory->define(App\Model\Review::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'product_id' => function(){
        	return Product::all()->random();
        },
		'customer' => $faker->name,
		'review'   => $faker->paragraph,
		'star'     => $faker->numberBetween(0,5),
    ];
});
