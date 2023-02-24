<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class apaCategories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $cats = [
            'বার্ষিক কর্মসম্পাদন চুক্তি',
            'সেবা প্রদান প্রতিশ্রুতি (সিটিজেনস চার্টার)',
            'জাতীয় শুদ্ধাচার কৌশল',
            'উদ্ভাবনী কার্যক্রম',
            'তথ্য অধিকার',
            'অভিযোগ প্রতিকার ব্যবস্থাপনা'
        ];

        foreach ($cats as $cat) {
            DB::table('apa_categories')->insert([
                'name' => $cat,
            ]);
        }
    }
}
