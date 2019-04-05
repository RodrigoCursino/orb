<?php

use Faker\Generator as Faker;


$factory->define(App\Models\Banco::class, function (Faker $faker) {
    return [
        "nome"  => $faker->company,
        "cod"   => $faker->numerify('###')
    ];
});
