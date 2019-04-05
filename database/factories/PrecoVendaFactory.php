<?php

use Faker\Generator as Faker;


$factory->define(App\Models\PrecoVenda::class, function (Faker $faker) {
    return [
        "valor"           => $faker->randomFloat(2,5,1000),
        "data"            => $faker->date('Y-m-d'),
        "mercadoria_id"   => $faker->numberBetween(1,250),
        "tabela_preco_id" => $faker->numberBetween(1,5),
    ];
});
