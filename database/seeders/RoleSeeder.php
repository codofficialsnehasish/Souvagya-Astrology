<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the default roles
        $roles = [
            'Super Admin',
        ];
        // Create the roles
        foreach ($roles as $roleName) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            // Assign permissions based on role
            switch ($roleName) {
                case 'admin':
                    $role->givePermissionTo(Permission::all());
                break;
            }
        }
    }
}
