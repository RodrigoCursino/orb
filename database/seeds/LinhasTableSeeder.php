<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class LinhasTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Linha::class, 5)->create();
    }
}
