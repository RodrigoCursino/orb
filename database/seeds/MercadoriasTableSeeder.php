<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class MercadoriasTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Mercadoria::class, 250)->create();
    }
}
