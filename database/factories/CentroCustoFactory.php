<?php

use Faker\Generator as Faker;


$factory->define(App\Models\CentroCusto::class, function (Faker $faker) {
    return [
        'nome'               => $faker->name,
        'dados_bancarios_id' => $faker->numberBetween(1,20)
        ];
});
