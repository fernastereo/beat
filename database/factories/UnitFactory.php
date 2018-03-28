<?php

use Faker\Generator as Faker;

$factory->define(App\Unit::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(array ('Unidad','Servicio','Metro', 'Metro 2', 'Metro 3', 'Centímetro', 'Centímetro 3', 'Litro', 'Galón', 'Gramo', 'Libra', 'Kilogramo')),
        'state' => true,
    ];
});
