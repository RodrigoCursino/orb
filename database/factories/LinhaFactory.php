<?php

use Faker\Generator as Faker;


$factory->define(App\Models\Linha::class, function (Faker $faker) {
    return [
        'nome' => $faker->name
    ];
});
