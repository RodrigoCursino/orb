<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UnidadesCaixaTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\UnidadeCaixa::class, 5)->create();
    }
}
