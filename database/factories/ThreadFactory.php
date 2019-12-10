<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Thread;
use Faker\Generator as Faker;

$factory->define(Thread::class, function (Faker $faker) {
    return [
        // Generate Title names
        'name' => $faker->sentence($nbWords = 5, $variableNbWords = true),
        // Assign a User to each thread
        'user_id' => $faker->unique(true)->numberBetween(1, 50),
    ];
});
