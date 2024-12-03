<?php

namespace Database\Seeders; // Ensure the correct namespace

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicationSeeder extends Seeder
{
    public function run()
    {
        $applications = [
            [
                'application_number' => 'APP001',
                'date' => '2023-04-01',
                'status' => 'Pending',
                'stage' => 'Initial Review',
                'company_detail_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'application_number' => 'APP002',
                'date' => '2023-04-02',
                'status' => 'Approved',
                'stage' => 'Final Review',
                'company_detail_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('applications')->insert($applications);
    }
}
