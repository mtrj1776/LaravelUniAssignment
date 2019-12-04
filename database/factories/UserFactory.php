<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        // Generate a random name for a User
        'name' => $faker->name,
        // Generate a forum username for a User
        'display_name' => $faker->userName,
        // Assign a rank for the User
        'permission_level' => $faker->randomElement(['administrator', 'moderator', 'user']),
    ];
});
