<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate the users table to delete all records
        User::truncate();

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'role' => 'Admin',
            'password' => Hash::make('admin123'),
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'role' => 'User',
            'password' => Hash::make('user123'),
        ]);
    }
}
