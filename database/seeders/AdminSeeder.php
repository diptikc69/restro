<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "Admin",
            "email" => "user@yopmail.com",
            "password" => bcrypt("123456"),
            "user_type" => 0,
            "status" => 1,
        ]);
    }
}
