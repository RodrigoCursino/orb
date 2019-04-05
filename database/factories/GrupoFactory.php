<?php

use Faker\Generator as Faker;


$factory->define(App\Models\Grupo::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'ncm'  => $faker->numerify('#####'),
        'observacao' => $faker->text(200)
    ];
});
