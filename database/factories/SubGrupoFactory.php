<?php

use Faker\Generator as Faker;


$factory->define(App\Models\SubGrupo::class, function (Faker $faker) {
    return [
        'nome'     => $faker->name,
        'grupo_id' => $faker->numberBetween(1,5)
    ];
});
