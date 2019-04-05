<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class SubGruposTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\SubGrupo::class, 20)->create();
    }
}
