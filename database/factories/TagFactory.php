<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    return [
        //
        // Generate Title names
        'name' => $faker->unique(true)->randomElement(['Fun', 'Boring', 'Useless Content', 'Most Important', 'Lax', 'Laravel', 'Web', 'CSS', 'PHP']),
    ];
});
