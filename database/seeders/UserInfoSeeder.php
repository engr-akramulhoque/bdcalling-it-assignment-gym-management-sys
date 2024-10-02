<?php

namespace Database\Seeders;

use App\Models\UserInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserInfo::create([
            'user_id' => "1",
            'bio' => "Write something about yourself",
        ]);
    }
}
