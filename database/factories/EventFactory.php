<?php

use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
    return [
    	'owner_id' => $faker->randomNumber,
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'start_date' => $faker->dateTime
    ];
});
