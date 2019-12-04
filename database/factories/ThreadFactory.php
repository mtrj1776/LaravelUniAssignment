<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Thread;
use Faker\Generator as Faker;

$factory->define(Thread::class, function (Faker $faker) {
    return [
        // Assign a User to each thread
        'user_id' => $faker->unique(true)->numberBetween(2, 51),
    ];
});
