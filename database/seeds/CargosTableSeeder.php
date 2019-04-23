<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class CargosTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Cargo::class, 5)->create();
    }
}
