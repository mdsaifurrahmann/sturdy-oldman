<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class NukeMaster extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'username' => 'saifur',
            'name' => 'saifur',
            'email' => 'md.saifurrahmann029@gmail.com',
            'mobile' => '01700000000',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
        ]);
        $user1->assignRole('nuke', 'admin');

        $user2 = User::create([
            'username' => 'saifurx',
            'name' => 'saifurx',
            'email' => 'md.saifurrahmann30@gmail.com',
            'mobile' => '01700000001',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
        ]);
    }
}
