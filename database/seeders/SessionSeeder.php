<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ClassTime;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classTimes = [
            [
                'title' => 'Morning Yoga Class',
                'trainer_id' => 1,
                'date' => Carbon::now()->addDays(5)->format('Y-m-d'),
                'start_time' => '08:00',
                'end_time' => '09:30',
                'capacity' => 20,
                'status' => 'Available',
                'participated' => 18
            ],
            [
                'title' => 'Weight Training Session',
                'trainer_id' => 1,
                'date' => Carbon::now()->addDays(7)->format('Y-m-d'),
                'start_time' => '10:00',
                'end_time' => '11:30',
                'capacity' => 15,
                'status' => 'Available',
                'participated' => 12
            ],
            [
                'title' => 'Evening Pilates Class',
                'trainer_id' => 1,
                'date' => Carbon::now()->addDays(10)->format('Y-m-d'),
                'start_time' => '17:00',
                'end_time' => '18:30',
                'capacity' => 25,
                'status' => 'Available',
                'participated' => 20
            ]
        ];

        // Insert data into the class_times table
        foreach ($classTimes as $classTime) {
            ClassTime::create($classTime);
        }
    }
}
