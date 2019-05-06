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

$factory->define(App\Models\Funcionario::class, function (Faker $faker) {
    return [
        'nome'               => $faker->name,
        'apelido'            => $faker->name,
        'salario'            => $faker->randomFloat(2,1500,5000),
        'data_nascimento'    => $faker->date('Y-m-d'),
        'rg'                 => \App\Traits\Mascara::mask('##.###.###-#',$faker->numerify('#########')),
        'cpf'                => \App\Traits\Mascara::mask('###.###.###-##',$faker->numerify('###########')),
        'estado_civil'       => $faker->boolean ? 'CASADO' : 'SOLTEIRO',
        'sexo'               => $faker->boolean ? 'FEMININO' : 'MASCULINO',
        'login'              => $faker->firstName,
        'observacao'         => $faker->text(250),
        'senha'              => $faker->numerify('######'),
        'endereco_id'        => $faker->numberBetween(1,20),
        'contato_id'         => $faker->numberBetween(1,20),
        'dados_bancarios_id' => $faker->numberBetween(1,20),
        'cargo_id'           => $faker->numberBetween(1,5),
        'departamento_id'    => $faker->numberBetween(1,5),
        'unidade_id'         => $faker->numberBetween(1,20),
    ];
});
