<?php

use Faker\Generator as Faker;

$factory->define(App\Location::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(array ('Almacen','Bodega 1','Bodega 2', 'Bodega 3', 'Puerto')),
        'description' => $faker->words(random_int(4, 10), true),
        'state' => true,
    ];
});
