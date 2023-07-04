<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Teste;
use Faker\Generator as Faker;

$factory->define(Teste::class, function (Faker $faker) {
    return [
        //name - nome da coluna e na frente o valor
        'name' => $faker->name,

        //email
        'email' => $faker->unique()->safeEmail,

        //prices
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 100, $max = 500),

        //votes
        'votes' => $faker->numberBetween($min = 10, $max = 200),
    ];
});
