<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class ColecoesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Colecao::class, 5)->create();
    }
}
