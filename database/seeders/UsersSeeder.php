<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                "first_name" => "Admin",
                "last_name" => "Administrator",
                "username" => "admin",
                "email" => "admin@gmail.com",
                "phone_main" => "254746055487",
                "password"=> Hash::make("@dmin"),
                "user_level" => 0,
            ],
            [
                "first_name" => "User",
                "last_name" => "Test",
                "username" => "user",
                "email" => "user@gmail.com",
                "phone_main" => "254746055487",
                "password"=> Hash::make("p@ssword"),
            ],
        ];

        foreach($users as $user) {
            User::create($user);
        }
    }
}
