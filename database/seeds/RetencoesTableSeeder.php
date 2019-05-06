<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class RetencoesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Retencao::class, 5)->create();
    }
}
