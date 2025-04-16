<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Operator;

class OperatorInfoSeeder extends Seeder
{
    public function run()
    {
        Operator::truncate();
        
        $companies = ['Tech Solutions', 'Innovate Corp', 'Digital Futures', 'Web Masters', 'Code Factory','Data Systems','Cloud Networks'];
        $positions = ['HR Manager', 'Recruitment Officer', 'Talent Acquisition', 'HR Director', 'CTO','CEO','CFO'];
        for ($i = 2; $i <= 8; $i++) {
            $index = $i - 2;
            Operator::create([
                'company' => $companies[$index] . ' Group',
                'position' => $positions[$index],
                'contact_email' => 'contact' . $i . '@' . str_replace(' ', '', strtolower($companies[$index])) . '.com',
                'operator_id' => $i,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}