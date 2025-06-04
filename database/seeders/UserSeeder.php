<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin1234'),
                'role' => User::ROLE_ADMIN,
            ],
            [
                'name' => 'Omar',
                'email' => 'omar@example.com',
                'password' => Hash::make('omar1234'),
                'role' => User::ROLE_USER,
            ],
            [
                'name' => 'Pro Gamer',
                'email' => 'progamer@example.com',
                'password' => Hash::make('progamer1234'),
                'role' => User::ROLE_USER,
            ]
        ]);
    }
}
