<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Nake;
use Faker\Generator as Faker;

$factory->define(Nake::class, function (Faker $faker) {
    return [
        // 'user_id' => $faker->randomDigitNot(0),
        // 'jnake_id' => $faker->randomElement($array = array('1', '2', '3')),
        'gender' => $faker->randomElement($array = array('L', 'P')),
        'nik' => $faker->numberBetween($min = 0000000000000000, $max = 9999999999999999),
        'full_name' => $faker->name,
        'gelar' => 's.kep',
        'tgl_lahir' => $faker->date($format = 'Y-m-d'),
        'nakes_phone_number' => $faker->e164PhoneNumber,
        'alamat' => $faker->address,
    ];
});
