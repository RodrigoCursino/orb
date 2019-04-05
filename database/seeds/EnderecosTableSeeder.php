<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class EnderecosTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Endereco::class, 20)->create();
    }
}
