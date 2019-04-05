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

$factory->define(App\Models\Fornecedor::class, function (Faker $faker) {
    return [
        'nome_fantasia'      => $faker->company,
        'razao_social'       => $faker->company,
        'cnpj'               => \App\Traits\Mascara::mask('##.###.###',$faker->numerify('########')) . "/0001-". $faker->numerify('##'),
        'ie'                 => \App\Traits\Mascara::mask('##.###.####-#',$faker->numerify('##########')),
        'observacao'         => $faker->text(200),
        'forn_mercadoria'    => $faker->boolean,
        'endereco_id'        => $faker->numberBetween(1,20),
        'contato_id'         => $faker->numberBetween(1,20),
        'dados_bancarios_id' => $faker->numberBetween(1,20)
    ];
});
