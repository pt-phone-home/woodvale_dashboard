<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Peter Tiernan',
            'email' => 'ptiernan@gmail.com',
            'password' => Hash::make('27milesin&&'),
            'isAdmin' => 1
        ]);

        DB::table('users')->insert([
           'name' => 'Ben',
           'email' => 'ben@woodvale.com',
           'password' => Hash::make('woodvale_WV2020&&'),
        ]);
    }
}
