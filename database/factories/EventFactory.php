<?php

use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
    return [
    	'owner_id' => $faker->randomNumber,
        'title' => $faker->sentence,
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'start_date' => $faker->date,
        'start_time' => $faker->time
    ];
});
