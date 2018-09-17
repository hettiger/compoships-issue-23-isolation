<?php

use App\ModelB;
use Faker\Generator as Faker;

$factory->define(ModelB::class, function (Faker $faker) {
    return [
        'event_id' => $faker->randomNumber(),
        'event_date' => $faker->dateTime(),
    ];
});
