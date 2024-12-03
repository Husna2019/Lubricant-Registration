<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DocumentsSeeder extends Seeder
{
    public function run()
    {
        DB::table('supporting_documents')->insert([
            [
                'name' => 'Document 1',
                'path' => '/path/to/document1.pdf',
                'extension' => 'pdf',
                'size' => '1MB',
                'type' => 'Type A',
                'company_detail_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Document 2',
                'path' => '/path/to/document2.docx',
                'extension' => 'docx',
                'size' => '2MB',
                'type' => 'Type B',
                'company_detail_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more documents as needed
        ]);
    }
}
