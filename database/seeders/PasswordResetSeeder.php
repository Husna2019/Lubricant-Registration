<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PasswordResetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('password_reset_tokens')->insert([
            'email' => 'sample@example.com',
            'token' => Str::random(60),
            'created_at' => now(),
        ]);
    }
}
