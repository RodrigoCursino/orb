<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class DadosBancariosTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\DadosBancarios::class, 20)->create();
    }
}
