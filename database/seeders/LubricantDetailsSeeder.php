<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LubricantDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lubricant_details')->insert([
            [
                'lubricant_name' => 'Lubricant A',
                'lubricant_type' => 'Synthetic',
                'lubricant_performance_level' => 'API SN',
                'lubricant_brand' => 'Brand X',
                'certification_name' => 'Certification A',
                'approval_status' => 'Approved',
                'company_detail_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'lubricant_name' => 'Lubricant B',
                'lubricant_type' => 'Mineral',
                'lubricant_performance_level' => 'API SM',
                'lubricant_brand' => 'Brand Y',
                'certification_name' => 'Certification B',
                'approval_status' => 'Pending',
                'company_detail_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
