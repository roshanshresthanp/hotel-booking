<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            'location' => 'Kathmandu',
            'contact' => '9802659877',
            'mail' => 'example@mail.com',
            'fb_link'=>'www.facebook.com/example',
            'insta_link'=>'www.instagram.com/example',
            'twitter_link'=>'www.twitter.com/example',
            'location_map'=>'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.097062842056!2d85.31605341501488!3d27.683394782801777!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19f1a12ed15f%3A0xd2addf7cee6a8e0b!2sLet%20IT%20Grow!5e0!3m2!1sen!2snp!4v1627380118358!5m2!1sen!2snp'

            
        ]);
    }
}
