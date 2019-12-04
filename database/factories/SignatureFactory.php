<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Signature;
use Faker\Generator as Faker;

$factory->define(Signature::class, function (Faker $faker) {
    return [
        //
        'user_id' => $faker->unique(true)->numberBetween(1, 50),
        'signature' => $faker->sentence($nbWords = 5, $variableNbWords = true),
    ];
});
