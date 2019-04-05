<?php

use Faker\Generator as Faker;


$factory->define(App\Models\PrecoCusto::class, function (Faker $faker) {
    return [
        "valor"           => $faker->randomFloat(2,5,1000),
        "data"            => $faker->date('Y-m-d'),
        "mercadoria_id"   => $faker->numberBetween(1,250),
        "fornecedor_id"   => $faker->numberBetween(1,50)
    ];
});
