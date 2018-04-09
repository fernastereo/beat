<?php

use Faker\Generator as Faker;

$factory->define(App\Company::class, function (Faker $faker) {
    return [
        'idcompany'             => $faker->randomNumber(7, false),
        'verification_digit'    => $faker->randomDigit,
        'name'                  => $faker->company,
        'address'               => $faker->address,
        'website'               => 'http://www.' . $faker->domainName,
        'email'                 => $faker->unique()->safeEmail,
        'companytype_id'        => $faker->randomDigit,
        'currency_id'           => $faker->randomDigit,
        'image'                 => $faker->imageUrl(160, 160, 'business'),
    ];
});
