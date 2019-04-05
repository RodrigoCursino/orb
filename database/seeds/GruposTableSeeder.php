<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class GruposTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Grupo::class, 5)->create();
    }
}
