<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Profile::factory(5)->create();
        \App\Models\Option::factory(15)->create();
        \App\Models\User::factory(30)->create();
    }
}
