<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // user section permissions
        Permission::firstOrCreate(['name' => 'users']);
        Permission::firstOrCreate(['name' => 'view user']);
        Permission::firstOrCreate(['name' => 'create user']);
        Permission::firstOrCreate(['name' => 'edit user']);
        Permission::firstOrCreate(['name' => 'delete user']);

        // role section permissions
        Permission::firstOrCreate(['name' => 'roles']);
        Permission::firstOrCreate(['name' => 'view role']);
        Permission::firstOrCreate(['name' => 'create role']);
        Permission::firstOrCreate(['name' => 'edit role']);
        Permission::firstOrCreate(['name' => 'delete role']);

        // class section permissions
        Permission::firstOrCreate(['name' => 'classes']);
        Permission::firstOrCreate(['name' => 'view class']);
        Permission::firstOrCreate(['name' => 'create class']);
        Permission::firstOrCreate(['name' => 'edit class']);
        Permission::firstOrCreate(['name' => 'delete class']);

        // booking section permissions
        Permission::firstOrCreate(['name' => 'bookings']);
        Permission::firstOrCreate(['name' => 'view booking']);
        Permission::firstOrCreate(['name' => 'create booking']);
        Permission::firstOrCreate(['name' => 'edit booking']);
        Permission::firstOrCreate(['name' => 'delete booking']);

        // permissions section
        Permission::firstOrCreate(['name' => 'view trainee']);
        Permission::firstOrCreate(['name' => 'view trainer']);
        Permission::firstOrCreate(['name' => 'view permission']);
    }
}
