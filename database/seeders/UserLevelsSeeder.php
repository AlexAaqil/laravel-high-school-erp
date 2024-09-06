<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserLevels;

class UserLevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_levels = [
            [
                "user_level" => 0,
                "description" => "super_admin",
            ],
            [
                "user_level" => 1,
                "description" => "admin",
            ],
            [
                "user_level" => 2,
                "description" => "accountant",
            ],
            [
                "user_level" => 3,
                "description" => "teacher",
            ],
        ];

        foreach($user_levels as $user_level) {
            UserLevels::create($user_level);
        }
    }
}
