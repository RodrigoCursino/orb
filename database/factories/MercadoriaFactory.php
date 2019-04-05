<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\Mercadoria::class, function (Faker $faker) {
    return [
        'nome'            => $faker->company,
        'ncm'             => $faker->companySuffix,
        'unidade_medida'  => "UN",
        'unidade_caixa'   => "UN",
        'observacao'      => $faker->text(200),
        'fornecedor_id'   => $faker->numberBetween(1,20),
        'grupo_id'        => $faker->numberBetween(1,5),
        'sub_grupo_id'    => $faker->numberBetween(1,20),
    ];
});
