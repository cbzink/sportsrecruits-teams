<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'user_type'       => $faker->randomElement(['player', 'coach']),
        'first_name'      => $faker->firstName,
        'last_name'       => $faker->lastName,
        'ranking'         => $faker->numberBetween(0, 5),
        'can_play_goalie' => $faker->boolean,
    ];
});
