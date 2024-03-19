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
        DB::table('users')->insert([
            //admin user

            [
                'name' => 'Kram Admin',
                'email' => 'kram1012@yahoo.com',
                'password' => Hash::make('123456'),
                'status' => 'active',
                'role' => 'admin',

            ],
              //sales user

              [
                'name' => 'Kram Sales',
                'email' => 'kram1012@gmail.com',
                'password' => Hash::make('123456'),
                'status' => 'active',
                'role' => 'sales',

            ],

            //normal user

            [
                'name' => 'Kram',
                'email' => 'kram1012@outlook.com',
                'password' => Hash::make('123456'),
                'status' => 'active',
                'role' => 'user',

            ],

        ]);
    }
}
