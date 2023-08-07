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

        $items1 = [

            ['name' => 'জাতীয় শুদ্ধাচার কৌশল', 'type_id' => '1', 'route_name' => 'nps', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'কমিটিসমূহ', 'type_id' => '1', 'route_name' => 'committees', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'কর্মপরিকল্পনা', 'type_id' => '1', 'route_name' => 'schedule', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'প্রতিবেদনসমূহ', 'type_id' => '1', 'route_name' => 'reports', 'created_at' => now(), 'updated_at' => now()],
        ];


        $items2 = [
            ['name' => 'সেবা প্রদান প্রতিশ্রুতি (সিটিজেনস চার্টার)', 'type_id' => '2', 'route_name' => 'sccc', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'ফোকাল পয়েন্ট কর্মকর্তা/পরিবীক্ষণ কমিটি', 'type_id' => '2', 'route_name' => 'fpo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'ত্রৈমাসিক/বার্ষিক পরিবীক্ষণ/মূল্যায়ন প্রতিবেদন', 'type_id' => '2', 'route_name' => 'qamer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'আইন/বিধি/নীতিমালা/পরিপত্র/নির্দেশিকা/প্রজ্ঞাপন', 'type_id' => '2', 'route_name' => 'laws', 'created_at' => now(), 'updated_at' => now()],
        ];


        $items3 = [
            ['name' => 'এপিএ নির্দেশিকা/পরিপত্র/এপিএ টিম', 'type_id' => '3', 'route_name' => 'apa-gct', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'বার্ষিক কর্মসম্পাদন চুক্তিসমূহ', 'type_id' => '3', 'route_name' => 'apc', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'পরিবীক্ষণ ও মূল্যায়ন প্রতিবেদন', 'type_id' => '3', 'route_name' => 'mer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'এপিএ এমএস সফটওয়্যার লিংক', 'type_id' => '3', 'route_name' => 'mssl', 'created_at' => now(), 'updated_at' => now()],
        ];


        $items4 = [
            ['name' => 'অনিক ও আপিল কর্মকর্তাগণ', 'type_id' => '4', 'route_name' => 'appellate-officers', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'মাসিক/ত্রৈমাসিক/বার্ষিক পরিবীক্ষণ/মূল্যায়ন প্রতিবেদন', 'type_id' => '4', 'route_name' => 'cer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'অভিযোগ দাখিল (অনলাইনে আবেদন)', 'type_id' => '4', 'route_name' => 'complaint-filing', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'আইন/বিধি/নীতিমালা/পরিপত্র', 'type_id' => '4', 'route_name' => 'complaint-laws', 'created_at' => now(), 'updated_at' => now()],
        ];


        $items5 = [
            ['name' => 'দায়িত্বপ্রাপ্ত কর্মকর্তা ও আপীল কর্তৃপক্ষ', 'type_id' => '5', 'route_name' => 'roaa', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'আবেদন ও আপিল ফরম', 'type_id' => '5', 'route_name' => 'appeal-form', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'স্বপ্রণোদিতভাবে প্রকাশযোগ্য তথ্য', 'type_id' => '5', 'route_name' => 'vdi', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'আইন/বিধি/কমিটি/নির্দেশিকা', 'type_id' => '5', 'route_name' => 'guidelines', 'created_at' => now(), 'updated_at' => now()],
        ];


        $items6 = [
            ['name' => 'প্রজ্ঞাপন/পরিপত্র/নীতিমালা/সংকলন', 'type_id' => '6', 'route_name' => 'compendiums', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'ইনোভেশন টিম', 'type_id' => '6', 'route_name' => 'innovation-team', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'বার্ষিক উদ্ভাবন কর্মপরিকল্পনা', 'type_id' => '6', 'route_name' => 'aiap', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'উদ্ভাবনী প্রকল্পসমূহ', 'type_id' => '6', 'route_name' => 'innovative-projects', 'created_at' => now(), 'updated_at' => now()],
        ];


        $items7 = [
            ['name' => 'বস্ত্র আইন', 'type_id' => '7', 'route_name' => 'fabric-laws', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'টেক্সটাইল শিক্ষা প্রতিষ্ঠান পরিদর্শন/পরিবীক্ষণ নির্দেশিকা', 'type_id' => '7', 'route_name' => 'gitei', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'বায়িং হাউজ নিবন্ধন প্রজ্ঞাপন', 'type_id' => '7', 'route_name' => 'bhr', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'আইন ও বিধি', 'type_id' => '7', 'route_name' => 'lar', 'created_at' => now(), 'updated_at' => now()],
        ];

        $items8 = [
            ['name' => 'প্রজ্ঞাপন', 'type_id' => '8', 'route_name' => 'propaganda', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'পাসপোর্টের অনাপত্তিপত্র', 'type_id' => '8', 'route_name' => 'nolp', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'নোটিশ/আদেশ/চিঠিপত্র', 'type_id' => '8', 'route_name' => 'nol', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'ফরম', 'type_id' => '8', 'route_name' => 'form', 'created_at' => now(), 'updated_at' => now()],
        ];

        $items9 = [
            ['name' => 'আমদানী নীতি', 'type_id' => '9', 'route_name' => 'import-policy', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'পরিদর্শন প্রতিবেদন', 'type_id' => '9', 'route_name' => 'inspection-report', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'আমাদের প্রকাশনা', 'type_id' => '9', 'route_name' => 'our-publication', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'বার্ষিক প্রতিবেদন', 'type_id' => '9', 'route_name' => 'annual-report', 'created_at' => now(), 'updated_at' => now()],
        ];



        if (DB::table('apa_categories')->count() === 0) {


            foreach ($items1 as $item) {
                DB::table('apa_categories')->insert([
                    'name'        => $item['name'],
                    'type_id' => $item['type_id'],
                    'route_name'  => $item['route_name'],
                    'created_at' => $item['created_at'],
                    'updated_at' => $item['updated_at']
                ]);
            }

            foreach ($items2 as $item) {
                DB::table('apa_categories')->insert([
                    'name'        => $item['name'],
                    'type_id' => $item['type_id'],
                    'route_name'  => $item['route_name'],
                    'created_at' => $item['created_at'],
                    'updated_at' => $item['updated_at']
                ]);
            }

            foreach ($items3 as $item) {
                DB::table('apa_categories')->insert([
                    'name'        => $item['name'],
                    'type_id' => $item['type_id'],
                    'route_name'  => $item['route_name'],
                    'created_at' => $item['created_at'],
                    'updated_at' => $item['updated_at']
                ]);
            }

            foreach ($items4 as $item) {
                DB::table('apa_categories')->insert([
                    'name'        => $item['name'],
                    'type_id' => $item['type_id'],
                    'route_name'  => $item['route_name'],
                    'created_at' => $item['created_at'],
                    'updated_at' => $item['updated_at']
                ]);
            }

            foreach ($items5 as $item) {
                DB::table('apa_categories')->insert([
                    'name'        => $item['name'],
                    'type_id' => $item['type_id'],
                    'route_name'  => $item['route_name'],
                    'created_at' => $item['created_at'],
                    'updated_at' => $item['updated_at']
                ]);
            }

            foreach ($items6 as $item) {
                DB::table('apa_categories')->insert([
                    'name'        => $item['name'],
                    'type_id' => $item['type_id'],
                    'route_name'  => $item['route_name'],
                    'created_at' => $item['created_at'],
                    'updated_at' => $item['updated_at']
                ]);
            }

            foreach ($items7 as $item) {
                DB::table('apa_categories')->insert([
                    'name'        => $item['name'],
                    'type_id' => $item['type_id'],
                    'route_name'  => $item['route_name'],
                    'created_at' => $item['created_at'],
                    'updated_at' => $item['updated_at']
                ]);
            }

            foreach ($items8 as $item) {
                DB::table('apa_categories')->insert([
                    'name'        => $item['name'],
                    'type_id' => $item['type_id'],
                    'route_name'  => $item['route_name'],
                    'created_at' => $item['created_at'],
                    'updated_at' => $item['updated_at']
                ]);
            }

            foreach ($items9 as $item) {
                DB::table('apa_categories')->insert([
                    'name'        => $item['name'],
                    'type_id' => $item['type_id'],
                    'route_name'  => $item['route_name'],
                    'created_at' => $item['created_at'],
                    'updated_at' => $item['updated_at']
                ]);
            }
        }
    }
}
