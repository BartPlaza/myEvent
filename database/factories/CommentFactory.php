<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomNumber,
        'event_id' => $faker->randomNumber,
        'body' => $faker->paragraph
    ];
});
