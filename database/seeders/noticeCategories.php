<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class noticeCategories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Notice',
            'Admission',
            'Job Corner',
            'Stipend',
            'News',
        ];

        foreach ($categories as $category) {
            DB::table('notice_categories')->insert([
                'name' => $category,
            ]);
        }
    }
}
