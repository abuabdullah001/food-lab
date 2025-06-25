<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin',
                'password' => bcrypt('1'),
                'role' => 'admin',
            ],
            [
                'name' => 'User',
                'email' => 'user@user',
                'password' => bcrypt('1'),
                'role' => 'customer',
            ]
        ];

        foreach ($data as $userData) {
            User::create($userData);
        }
        // You can add more users as needed
    }
}
