<?php

use Faker\Generator as Faker;

$factory->define(App\Invoice::class, function (Faker $faker) {
    return [
		'id_invoice'		=> $faker->randomNumber(4, false),
        'numeration_id'		=> $faker->randomDigit,	
        'invoice_date'		=> $faker->date('Y-m-d', 'now'),
        'expire_date'		=> $faker->date('Y-m-d', 'now'),
        'term_id'			=> $faker->randomDigit,
        'paymenttype_id'	=> $faker->randomDigit,
        'status_id'			=> $faker->randomDigit,
    ];
});
