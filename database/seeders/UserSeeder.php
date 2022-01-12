<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            array(
                array(
                    'name' => 'Hotel Admin',
                    'email' => 'admin@trimurti.com',
                    'password' => bcrypt('admin123')
                ),
            ),
        );
    }
}
