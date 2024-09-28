<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Super Admin',
            'role' => 'admin',
            'email' => 'admin@admin.com',
            'phone' => '0000000000',
            'password' => Hash::make('admin'),
        ]);
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            RoleAssignmentSeeder::class
        ]);
    }
}
