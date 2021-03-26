<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*App\User->create([
        	'name' => 'Evelio Ramirez',
        	'email' => 'eramrezg@gmail.com',
        	'profile_id' => 1,
        	'password' => bcrypt('Jarvis*77'),
        ]);*/
        DB::table('users')->insert([
            'name' => 'Evelio Ramirez',
            'email' => 'eramrezg@gmail.com',
            'profile_id' => 1,
            'password' => bcrypt('qwerty123'),
        ]);


        factory(App\User::class, 29)->create();

        
    }
}
