<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define users data
        $users = [
            [
                'firstname' => 'Admin',
                'lastname' => 'User',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'status' => true,
                'is_superadmin' => true,
                'is_trainee' => false,
                'role' => 'administration',
            ],
            [
                'firstname' => 'Trainer',
                'lastname' => 'User',
                'email' => 'trainer@gmail.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'status' => true,
                'is_superadmin' => false,
                'is_trainee' => false,
                'role' => 'trainer',
                'trainer_details' => [
                    'dob' => '12/01/2000',
                ]
            ],
            [
                'firstname' => 'Trainee',
                'lastname' => 'User',
                'email' => 'trainee@gmail.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'status' => true,
                'is_superadmin' => false,
                'is_trainee' => true,
                'role' => null,  // No role assigned
            ],
        ];

        // Create users and assign roles
        foreach ($users as $userData) {
            // Create the user
            $user = User::factory()->create(collect($userData)->except('role', 'trainer_details')->toArray());

            // Check if trainer details exist and create the trainer profile
            if (isset($userData['trainer_details'])) {
                $user->trainer()->create([
                    'dob' => $userData['trainer_details']['dob']
                ]);
            }

            // Assign role if defined
            if ($userData['role']) {
                $user->assignRole($userData['role']);
            }
        }
    }
}
