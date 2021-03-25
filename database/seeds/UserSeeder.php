<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // UserSeeder::factory(1);

        DB::table('users')->insert([
            'name' => 'Jimmy',
            'email' => 'jimlaravel@gmail.com',
            'type' => 'Admin',
            'password' => Hash::make('password'),
        ]);
    }
}
