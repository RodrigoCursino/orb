<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class PrecoVendaTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\PrecoVenda::class, 250)->create();
    }
}
