<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Admin
        DB::table('users')->insert([
            [
                'name' => 'Super Admin',
                'username' => 'admin',
                'email' => 'admin@mail.com',
                'password' => HASH::make('password'),
                'role' => 'admin',
            ],
            //Vendor
            [
                'name' => 'Vendor Management',
                'username' => 'management',
                'email' => 'management@mail.com',
                'password' => HASH::make('password'),
                'role' => 'vendor',
            ],
            // User
            [
                'name' => 'User',
                'username' => 'user',
                'email' => 'user@mail.com',
                'password' => HASH::make('password'),
                'role' => 'vendor',
            ],
        ]);
    }
}
