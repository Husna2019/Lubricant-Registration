<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChecklistItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          // Seed checklist items
          $items = [
            ['item' => 'Proof of Certification Bodies (API, NLGI, ACEA)', 'response' => 'pending','company_detail_id'=> 1],
            ['item' => 'Proof of Certification from OEM', 'response' => 'pending' ,'company_detail_id'=> 1],
            ['item' => 'Certification of the Additive Manufacturer', 'response' => 'pending', 'company_detail_id'=> 1],
            ['item' => 'Certified Copy of the TBS Licence (for locally blended lubricants)', 'response' => 'pending', 'company_detail_id'=> 1],
        ];
        
        DB::table('checklist_items')->insert($items);
    }
}
