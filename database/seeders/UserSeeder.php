<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::factory()->create([
            'firstname' => 'Trainee',
            'lastname' => 'User',
            'email' => 'trainee@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'status' => true,
            'is_trainee' => true,
            'is_superadmin' => false,
        ]);

        $user = User::factory()->create([
            'firstname' => 'Super',
            'lastname' => 'User',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'status' => true,
            'is_superadmin' => true,
            'is_trainee' => false,
        ]);

        $user->assignRole('administration');
    }
}
