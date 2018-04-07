<?php

use Faker\Generator as Faker;

$factory->define(App\Item::class, function (Faker $faker) {
    return [
        'id_item'       => $faker->unique()->ean8,
        'name'          => $faker->words(2, true),
        'description'   => $faker->words(random_int(4, 10), true),
        'image'         => $faker->imageUrl(160, 160, 'technics'), 
        'cost'          => $faker->numberBetween(20000, 500000),
        'price'         => $faker->numberBetween(6000, 230000),
        'stock'         => $faker->numberBetween(0, 500),
        'stock_min'     => $faker->numberBetween(10, 30),
        'stock_max'     => $faker->numberBetween(50, 150),
        'included_tax'  => $faker->boolean(70),
        'max_discount'  => $faker->numberBetween(0, 15),
        'state'         => true,
    ];
});
