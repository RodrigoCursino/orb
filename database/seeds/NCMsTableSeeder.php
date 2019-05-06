<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class NCMsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\NCM::class, 50)->create();
    }
}
