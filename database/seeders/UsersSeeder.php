<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder; 
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         DB::table('users')->insert([

             [
             'email' => 'seeder1@gmail.com',
             'email_verified_at' => now(), 
             'username' => 'user1',
             'password' => Hash::make('password1'),
             'first_name' => 'Ashura',
             'middle_name' => 'A.',
             'surname' => 'Idrisa',
             'gender' => 'Female',
             'phone_number' => '1234567890',
             'remember_token' => Str::random(10), 
             'created_at' => now(),
             'updated_at' => now(),
            ],
            [
            'email' => 'seeder2@gmail.com', 
            'email_verified_at' => now(),
            'username' => 'user2', 
            'password' => Hash::make('password2'),
            'first_name' => 'Edward', 
            'middle_name' => 'B.', 
            'surname' => 'Kafuka',
            'gender' => 'Male',
            'phone_number' => '0987654321',
            'remember_token' => Str::random(10),
            'created_at' => now(), 'updated_at' => now(),
                                ],
            ]);
    
}
}
