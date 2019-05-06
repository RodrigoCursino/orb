<?php

use Faker\Generator as Faker;


$factory->define(App\Models\NCM::class, function (Faker $faker) {
    return [
        'cod'       => $faker->numerify('#####'),
        'descricao' => $faker->text(200)
    ];
});
