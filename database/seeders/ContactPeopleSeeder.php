<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Str;

class ContactPeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('contact_people')->insert([
             [ 
                'name' => 'Huu ', 
                'title' => 'Manager',
                 'address2' => '123 Main St', 
                 'cellphone' => '1234567890', 
                 'cellphone1' => '0987654321', 
                 'email2' => 'huu@gmail.com.com', 
                 'company_detail_id' => 1,
                 'created_at' => now(),
                 'updated_at' => now(),
                 ],
                  [ 
                  'name' => 'Shuu ',
                  'title' => 'Director',
                  'address2' => '456 Oak St',
                  'cellphone' => '2345678901', 
                  'cellphone1' => '9876543210', 
                  'email2' => 'shu@gmail.com',
                  'company_detail_id' => 2, 
                  'created_at' => now(), 
                  'updated_at' => now(),
                  ],
          ]);
    }
}
