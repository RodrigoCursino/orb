<?php

use Faker\Generator as Faker;


$factory->define(App\Models\DadosBancarios::class, function (Faker $faker) {
    return [
        "agencia"  => $faker->numerify('######'),
        "conta"    => $faker->bankAccountNumber,
        "banco_id" => $faker->numberBetween(1,5)
    ];
});
