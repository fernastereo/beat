<?php

use Faker\Generator as Faker;

$factory->define(App\Tax::class, function (Faker $faker) {
    return [
        'name'		=> $faker->word,
        'tax'		=> $faker->numberBetween(0, 19),
        'state'		=> true,
    ];
});
