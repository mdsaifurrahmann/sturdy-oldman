<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstituteInfo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table("institute_info")->count() === 0) {
            DB::table('institute_info')->insert([
                'institute_name' => 'Institute Name',
                'location' => 'Location',
                'address' => 'Address',
                'phone' => '019000000',
                'phone_2' => '019000000',
                'email' => 'example@domain.name',
                'email_2' => '',
                'website' => 'www.example.com',
                'logo' => '/images/logo.png',
                'institute_image' => '/images/institute_image.png',
                'image_left' => '/images/image_left.png',
                'image_right' => '/images/image_right.png',
                'favicon' => '/images/favicon.png',
                'facebook' => '',
                'twitter' => '',
                'instagram' => '',
                'youtube' => '',
                'linkedin' => '',
                'whatsapp' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }


    }
}
