<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class principal extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if (DB::table('principal')->count() === 0) {
            DB::table('principal')->insert([
                'principal_name' => 'Md. Saifur Rahman',
                'qop' => 'PhD',
                'position' => 'Principal',
                'institute' => 'Dhaka University',
                'pi' => 'principal.jpg',
                'pip' => 'principal-passport.jpg',
                'description' => 'Lor',
                'message' => 'Lor'
            ]);
        }


    }
}
