<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hotels')->insert([
            'name' => 'Hotel Name',
            'description' => 'Hotel short description',
            'logo' => 'logo.jpg',
            'banner'=>'banner.jpg',
           
            
        ]);
    }
}
