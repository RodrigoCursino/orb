<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class FornecedoresTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Fornecedor::class, 50)->create();
    }
}
