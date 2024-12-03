<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        // Retrieve the table names from the configuration
        $tableNames = Config::get('permission.table_names');
        $columnNames = Config::get('permission.column_names');

        $roles = [
            [
                'name' => 'admin',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Applicant',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($roles as $role) {
            // If teams are enabled, add the team foreign key value
            if (Config::get('permission.teams')) {
                $role[$columnNames['team_foreign_key']] = 1; // or any appropriate team ID
            }
            DB::table($tableNames['roles'])->insert($role);
        }
    }
}
