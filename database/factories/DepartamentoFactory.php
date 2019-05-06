<?php

use Faker\Generator as Faker;


$factory->define(App\Models\Departamento::class, function (Faker $faker) {
    return [
        'nome'       => $faker->name,
        'descricao'  => $faker->text(50),
        'unidade_id' => $faker->numberBetween(1,20)
        ];
});
