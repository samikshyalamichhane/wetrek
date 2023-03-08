<?php

namespace database\seeders;

use Illuminate\Database\Seeder;
use App\User as AppUser;
use Illuminate\Foundation\Auth\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'info@user.com',
            'password' => bcrypt('secret'),
            // 'publish' => 1,
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@wetrek.com',
            'password' => bcrypt('secret'),
            // 'publish' => 1,
        ]);
    }
}