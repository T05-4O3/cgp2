<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // Admin

            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@test.com',
                'password' => Hash::make('111'),
                'role' => 'admin',
                'status' => 'active',
            ],

            // Creator
            [
                'name' => 'Creator',
                'username' => 'creator',
                'email' => 'creator@test.com',
                'password' => Hash::make('111'),
                'role' => 'creator',
                'status' => 'active',
            ],

            // User
            [
                'name' => 'User',
                'username' => 'user',
                'email' => 'user@test.com',
                'password' => Hash::make('111'),
                'role' => 'user',
                'status' => 'active',
            ],



        ]);
    }
}
