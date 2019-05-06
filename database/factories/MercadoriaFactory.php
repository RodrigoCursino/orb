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
        'nome'               => $faker->company,
        'observacao'         => $faker->text(200),
        'fornecedor_id'      => $faker->numberBetween(1,20),
        'linha_id'           => $faker->numberBetween(1,5),
        'colecao_id'         => $faker->numberBetween(1,5),
        'categoria_id'       => $faker->numberBetween(1,5),
        'marca_id'           => $faker->numberBetween(1,5),
        'grupo_id'           => $faker->numberBetween(1,5),
        'sub_grupo_id'       => $faker->numberBetween(1,20),
        'ncm_id'             => $faker->numberBetween(1,50),
        'unidade_medida_id'  => $faker->numberBetween(1,5),
        'unidade_caixa_id'   => $faker->numberBetween(1,5),
    ];
});
