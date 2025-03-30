<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParticipantInfoSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 7; $i <= 26; $i++) { // Users 7-26 are participants
            DB::table('participants_info')->insert([
                'cv' => 'cv_user_' . $i . '.pdf',
                'motiv' => $i % 2 === 0 ? 'motivation_letter_user_' . $i . '.pdf' : null,
                'participant_id' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}