<?php

// database/seeders/RolesAndPermissionsSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    
        public function run()
        {
            
                // Create permissions
                $permissions = [
                    'apply for registration',
                    'receive and assign',
                    'evaluate lubricant',
                    'review evaluation',
                    'review and assign TMP',
                    'prepare submission to technical committee',
                    'update technical committee decision',
                    'admin access' // Adding an additional permission for admin role
                ];
        
                foreach ($permissions as $permission) {
                    Permission::create(['name' => $permission]);
                }
        
                // Create roles and assign existing permissions
                $applicantRole = Role::create(['name' => 'Applicant']);
                $applicantRole->givePermissionTo('apply for registration');
        
                $pePQRole = Role::create(['name' => 'PE-PQ']);
                $pePQRole->givePermissionTo(['receive and assign', 'review evaluation']);
        
                $lubricantEvaluatorRole = Role::create(['name' => 'Lubricant Evaluator']);
                $lubricantEvaluatorRole->givePermissionTo('evaluate lubricant');
        
                $tmpRole = Role::create(['name' => 'TMP']);
                $tmpRole->givePermissionTo('review and assign TMP');
        
                $ltcSecretaryRole = Role::create(['name' => 'LTC Secretary']);
                $ltcSecretaryRole->givePermissionTo(['prepare submission to technical committee', 'update technical committee decision']);
        
                // Create admin role and assign all permissions
                $adminRole = Role::create(['name' => 'admin']);
                $adminRole->givePermissionTo(Permission::all());
        
                // Optionally, assign roles to a user
                $user = User::find(1); // Example user ID
                $user->assignRole($applicantRole);
                $user->assignRole($adminRole); // Assigning admin role as an example


                
            }
}
