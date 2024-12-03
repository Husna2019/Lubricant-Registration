<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    public function run()
    {
        $comments = [
            [
                'application_id' => 'lub1',
                'stage_id' => 'stage1',
                'user_id' => 1,
                'comments' => 'This is the first comment.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'application_id' => 'lub2',
                'stage_id' => 'stage2',
                'user_id' => 2,
                'comments' => 'This is the second comment.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('comments')->insert($comments);
    }
}
