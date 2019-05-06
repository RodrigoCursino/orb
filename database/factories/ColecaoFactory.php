<?php

use Faker\Generator as Faker;


$factory->define(App\Models\Colecao::class, function (Faker $faker) {
    return [
        'nome' => $faker->name
    ];
});
