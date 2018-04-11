<?php

use Faker\Generator as Faker;

$factory->define(App\Person::class, function (Faker $faker) {
    return [
        'id_person'				=> $faker->randomNumber(9, false),
        'verification_digit' 	=> $faker->randomDigit,
        'name'					=> $faker->company,
        'address'				=> $faker->address,
        'city_name'				=> $faker->city,
        'email'					=> $faker->unique()->freeEmail,
        'phone_number_1'		=> $faker->phoneNumber,
        'phone_number_2'		=> $faker->phoneNumber,
        'cellphone_number_1'	=> $faker->phoneNumber,
        'credit_limit'			=> $faker->numberBetween(1000000, 9000000),
        'credit_used'			=> 0,
        'person_type'			=> $faker->randomElement(array('C', 'S', 'B')),
        'comments'              => $faker->realText(random_int(80, 160)),
        'state'					=> $faker->boolean(70),
    ];
});
