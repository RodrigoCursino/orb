<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UnidadesMedidaTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\UnidadeMedida::class, 5)->create();
    }
}
