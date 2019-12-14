<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
    return [
        // Generate a random name for a User
        'name' => $faker->name,
        // Generate an email address for a User
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        // Generate a forum username for a User
        'display_name' => $faker->userName,
        // Assign a rank for the User
        'permission_level' => $faker->randomElement(['administrator', 'moderator', 'user']),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
