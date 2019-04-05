<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class ContatosTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Contato::class, 20)->create();
    }
}
