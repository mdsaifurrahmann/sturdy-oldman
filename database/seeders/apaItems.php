<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class apaItems extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items1 = [
            'এপিএ নির্দেশিকা/পরিপত্র/এপিএ টিম',
            'বার্ষিক কর্মসম্পাদন চুক্তিসমূহ',
            'পরিবীক্ষণ ও মূল্যায়ন প্রতিবেদন',
            'এপিএ এমএস সফটওয়্যার লিংক'
        ];

        $items2 = [
            'সেবা প্রদান প্রতিশ্রুতি (সিটিজেনস চার্টার)',
            'ফোকাল পয়েন্ট কর্মকর্তা/পরিবীক্ষণ কমিটি',
            'ত্রৈমাসিক/বার্ষিক পরিবীক্ষণ/মূল্যায়ন প্রতিবেদন',
            'আইন/বিধি/নীতিমালা/পরিপত্র/নির্দেশিকা/প্রজ্ঞাপন'
        ];

        $items3 = [
            'জাতীয় শুদ্ধাচার কৌশল',
            'কমিটিসমূহ',
            'কর্মপরিকল্পনা',
            'প্রতিবেদনসমূহ'
        ];

        $items4 = [
            'প্রজ্ঞাপন/পরিপত্র/নীতিমালা/সংকলন',
            'ইনোভেশন টিম',
            'বার্ষিক উদ্ভাবন কর্মপরিকল্পনা',
            'উদ্ভাবনী প্রকল্পসমূহ'
        ];

        $items5 = [
            'দায়িত্বপ্রাপ্ত কর্মকর্তা ও আপীল কর্তৃপক্ষ',
            'আবেদন ও আপিল ফরম',
            'স্বপ্রণোদিতভাবে প্রকাশযোগ্য তথ্য',
            'আইন/বিধি/কমিটি/নির্দেশিকা'
        ];

        $items6 = [
            'অনিক ও আপিল কর্মকর্তাগণ',
            'মাসিক/ত্রৈমাসিক/বার্ষিক পরিবীক্ষণ/মূল্যায়ন প্রতিবেদন',
            'অভিযোগ দাখিল (অনলাইনে আবেদন)',
            'আইন/বিধি/নীতিমালা/পরিপত্র'
        ];

        foreach ($items1 as $item) {
            DB::table('apa_items')->insert([
                'name' => $item,
                'category_id' => 1,
            ]);
        }

        foreach ($items2 as $item) {
            DB::table('apa_items')->insert([
                'name' => $item,
                'category_id' => 2,
            ]);
        }

        foreach ($items3 as $item) {
            DB::table('apa_items')->insert([
                'name' => $item,
                'category_id' => 3,
            ]);
        }

        foreach ($items4 as $item) {
            DB::table('apa_items')->insert([
                'name' => $item,
                'category_id' => 4,
            ]);
        }

        foreach ($items5 as $item) {
            DB::table('apa_items')->insert([
                'name' => $item,
                'category_id' => 5,
            ]);
        }

        foreach ($items6 as $item) {
            DB::table('apa_items')->insert([
                'name' => $item,
                'category_id' => 6,
            ]);
        }


    }
}
