<?php

use Faker\Generator as Faker;


$factory->define(App\Models\Grupo::class, function (Faker $faker) {
    return [
        'nome'       => $faker->name,
        'ncm_id'     => $faker->numberBetween(1,50),
        'observacao' => $faker->text(200)
    ];
});
