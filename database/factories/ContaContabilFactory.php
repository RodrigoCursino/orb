<?php

use Faker\Generator as Faker;


$factory->define(App\Models\ContaContabil::class, function (Faker $faker) {
    return [
        'nome'               => $faker->name,
        'cod_contabilidade'  => $faker->word
        ];
});
