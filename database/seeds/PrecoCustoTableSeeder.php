<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class PrecoCustoTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\PrecoCusto::class, 250)->create();
    }
}
