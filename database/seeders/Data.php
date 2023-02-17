<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Data extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data')->insert([
            [
                'target' => 'slider',
                'data' => '[{"title":"hello1","desc":"hello sec 1","image":"1676419846IFut8vzlqhmmShQ5-slider-0.jpg"}]',
            ],
            [
                "target" => "history",
                "data" => '{"history": "history", "image": "history.jpg", "title": "Textile Institute, Dinajpur in a unique role in technical education:"}',
            ]
        ]);
    }
}
