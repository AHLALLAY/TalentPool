<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OperatorInfoSeeder extends Seeder
{
    public function run(): void
    {
        $companies = ['Tech Corp', 'Innovate Ltd', 'Future Inc', 'Digital Solutions', 'Web Masters'];
        $positions = ['HR Manager', 'Recruitment Officer', 'Talent Acquisition', 'HR Director', 'CTO'];

        for ($i = 2; $i <= 8; $i++) { // Users 2-6 are operators
            DB::table('operators_info')->insert([
                'company' => $companies[$i-2] . ' ' . $i,
                'position' => $positions[$i-2],
                'contact_email' => 'contact' . $i . '@company.com',
                'operator_id' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}