<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class TabelaPrecosTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\TabelaPreco::class, 5)->create();
    }
}
