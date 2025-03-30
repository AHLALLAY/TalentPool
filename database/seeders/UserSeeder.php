<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
            'roles' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create operator users
        for ($i = 1; $i <= 5; $i++) {
            DB::table('users')->insert([
                'name' => 'Operator ' . $i,
                'email' => 'operator' . $i . '@example.com',
                'password' => Hash::make('123456789'),
                'roles' => 'operator',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Create participant users
        for ($i = 1; $i <= 20; $i++) {
            DB::table('users')->insert([
                'name' => 'Participant ' . $i,
                'email' => 'participant' . $i . '@example.com',
                'password' => Hash::make('123456789'),
                'roles' => 'participant',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}