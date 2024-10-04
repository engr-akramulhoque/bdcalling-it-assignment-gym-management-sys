<?php

namespace Database\Seeders;

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
        $adminRole = Role::firstOrCreate(['name' => 'administration']);
        $adminRole->syncPermissions(Permission::all());

        // Create the 'trainer' role and assign specific permissions to it
        $trainerPermissions = [
            'view schedule',
        ];

        $trainerRole = Role::firstOrCreate(['name' => 'trainer']);
        $trainerRole->syncPermissions($trainerPermissions);
    }
}
