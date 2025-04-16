<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::truncate();
        // Create admin user
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'roles' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create operator users
        for ($i = 2; $i <= 8; $i++) {
            DB::table('users')->insert([
                'name' => 'Operator ' . $i,
                'email' => 'operator' . $i . '@gmail.com',
                'password' => Hash::make('123456789'),
                'roles' => 'operator',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Create participant users
        for ($i = 9; $i <= 20; $i++) {
            DB::table('users')->insert([
                'name' => 'Participant ' . $i,
                'email' => 'participant' . $i . '@gmail.com',
                'password' => Hash::make('123456789'),
                'roles' => 'participant',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}