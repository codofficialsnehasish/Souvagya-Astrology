<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                // Define the default permissions
                $permissions = [
                    'Create Role',
                    'View Role',
                    'Edit Role',
                    'Delete Role',
                    'Create Permission',
                    'View Permission',
                    'Edit Permission',
                    'Delete Permission',
                    'Asign Permission',
                    'Create User',
                    'View User',
                    'Edit User',
                    'Delete User',
                ];
        
                // Create the permissions
                foreach ($permissions as $permission) {
                    Permission::firstOrCreate(['name' => $permission]);
                }
        
    }
}
