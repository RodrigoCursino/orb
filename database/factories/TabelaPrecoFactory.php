<?php

use Faker\Generator as Faker;


$factory->define(App\Models\TabelaPreco::class, function (Faker $faker) {
    return [
        "descricao"       => $faker->text(250),
        "observacao"      => $faker->text(250),
        "desconto_maximo" => $faker->randomFloat(2,0,1000),
        "validade"        => $faker->date('Y-m-d')
    ];
});
