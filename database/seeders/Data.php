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
                "data" => '{"history": "Between 1911 A.D. and 1913, the British government established 25 Peripatetic Schools and 9 Weaving Schools in undivided India. and 1929 A.D. to teach Bengalis how to make yarn into textiles. District weaving was the name given to the textile schools. In Khulna, one of them, the current Dinajpur Textile Institute, was founded in 1926 AD. It was moved from Khulna to Dinajpur in the academic year 1960–1961, entirely thanks to one of the inventive kids from Dinajpur. The former Dinajpur District Weaving School used to offer a one-year vocational course. In the year 1980 AD, the government changed the name of the District Weaving School to District Textile Institute, abolishing the one-year artisan program and introducing a two-year certificate program. Later, a 3-year diploma-in-textile technology The former Dinajpur District Weaving School used to offer a one-year vocational course. In the year 1980 AD, the government changed the name of the District Weaving School to District Textile Institute, abolishing the one-year artisan program and introducing a two-year certificate program. Later, a 3-year diploma-in-textile technology course was introduced through a development project from the academic year 1993-1994 and the certificate course was eliminated due to the enormous need for middle-level technicians in textile plants. 50 seats were authorized for the specified course. 80 seats were eventually added in phases. The course\'s length was increased from three to four years beginning with the 2001–2002 academic year, and the name was changed to Diploma in Textile Engineering. The government began offering the Diploma in Textile Engineering course through a second shift program in the academic year 2004–2005 with 80 seats because to the rising demand for textile ships. The academic year 2012–2013 has been completed by the students admitted during the second shift. Students were thereafter admitted in one shift up until the academic year of 2015–2016. Students are now being admitted from the current academic year in the first and second shifts. There are 200 seats available.", "image": "1676664198-history-83U3fx2liKpicZfA.jpg", "title": "History of Textile Institute Dinajpur"}',
            ],
            [
                'target' => 'machinery',
                'data' => '{"description":"Workshop and Laboratory Facilities Diploma-in-Engineering courses are divided into 60 percent practical and 40 percent theoretical parts. There are workshops and laboratories equipped with modern equipment for conducting practical classes. The subject teachers conduct the practical classes, and the workshops help. Department based workshops and laboratories.","items":["Construction Shop","Plumbing Shop","Material Testing Lab","Soil Mechanics Lab","Survey Lab","Wood shop"]}',
            ]
        ]);
    }
}
