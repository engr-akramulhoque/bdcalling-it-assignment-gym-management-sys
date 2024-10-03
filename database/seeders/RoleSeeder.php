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
        $role1 = Role::create([
            'name' => 'trainer',
        ]);
        $role1->givePermissionTo([
            'classes',
            'view class',
            'create class',
            'edit class',
            'delete class',
        ]);

        $role = Role::create([
            'name' => 'administration',
        ]);

        $role->givePermissionTo(Permission::all());
    }
}
