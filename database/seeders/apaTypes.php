<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class apaTypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $cats = [
            ["name" => 'জাতীয় শুদ্ধাচার কৌশল', "image" => "nis.png", "created_at" => now(), "updated_at" => now()],
            ["name" => "সেবা প্রদান প্রতিশ্রুতি (সিটিজেনস চার্টার)", "image" => "citizen.svg", "created_at" => now(), "updated_at" => now()],
            ["name" => "বার্ষিক কর্মসম্পাদন চুক্তি", "image" => "apa.png", "created_at" => now(), "updated_at" => now()],
            ["name" => "অভিযোগ প্রতিকার ব্যবস্থাপনা", "image" => "ask.svg", "created_at" => now(), "updated_at" => now()],
            ["name" => "তথ্য অধিকার", "image" => "info.svg", "created_at" => now(), "updated_at" => now()],
            ["name" => "উদ্ভাবনী কার্যক্রম", "image" => "innovation.svg", "created_at" => now(), "updated_at" => now()],
            ["name" => "আইন, বিধি, নীতি, প্রজ্ঞাপন", "image" => "policy.svg", "created_at" => now(), "updated_at" => now()],
            ["name" => "আদেশ/বিজ্ঞপ্তি/প্রজ্ঞাপন/ফরম", "image" => "notice.svg", "created_at" => now(), "updated_at" => now()],
            ["name" => "নীতি/ প্রকাশনা/পরিদর্শন প্রতিবেদন", "image" => "law.svg", "created_at" => now(), "updated_at" => now()],
        ];

        if (DB::table("apa_types")->count() === 0) {
            foreach ($cats as $cat) {
                DB::table('apa_types')->insert([
                    'name' => $cat['name'],
                    'image' => $cat['image'],
                    'created_at' => $cat['created_at'],
                    'updated_at' => $cat['updated_at']
                ]);
            }
        }
    }
}
