<?php

namespace Database\Seeders; // Ensure the correct namespace

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyDetailsSeeder extends Seeder
{
    public function run()
    {
        $companyDetails = [
            [
                'company_name' => 'Company One',
                'license' => 'License001',
                'region' => 'Region One',
                'block' => 'Block A',
                'address' => '123 First St',
                'telephone' => '1234567890',
                'email' => 'companyone@gmail.com',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_name' => 'Company Two',
                'license' => 'License002',
                'region' => 'Region Two',
                'block' => 'Block B',
                'address' => '456 Second St',
                'telephone' => '0987654321',
                'email' => 'companytwo@gmail.com.com',
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('company_details')->insert($companyDetails);
    }
}
