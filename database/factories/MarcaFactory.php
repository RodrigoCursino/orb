<?php

use Faker\Generator as Faker;


$factory->define(App\Models\Marca::class, function (Faker $faker) {
    return [
        'nome'          => $faker->name,
        'fabricante_id' => $faker->numberBetween(1,5)
    ];
});
