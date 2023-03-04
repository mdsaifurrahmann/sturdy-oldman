<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Spatie\Permission\Models\Role;

class NukeOperator extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!DB::table('roles')->count() === 0) {
            Role::create(['name' => 'nuke']);
            Role::create(['name' => 'admin']);
            Role::create(['name' => 'moderator']);
            Role::create(['name' => 'user']);
        }
    }
}
