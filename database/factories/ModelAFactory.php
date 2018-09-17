<?php

use App\ModelA;
use Faker\Generator as Faker;

$factory->define(ModelA::class, function (Faker $faker) {
    return [
        'event_id' => $faker->randomNumber(),
        'event_date' => $faker->dateTime(),
    ];
});
