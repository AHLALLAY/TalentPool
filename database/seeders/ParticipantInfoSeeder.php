<?php

namespace Database\Seeders;

use App\Models\Participant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParticipantInfoSeeder extends Seeder
{
    public function run(): void
    {
        Participant::truncate();
        
        for ($i = 9; $i <= 20; $i++) {
            $participant = Participant::create([
                'cv' => 'cv_user_' . $i . '.pdf',
                'motiv' => $i % 2 === 0 ? 'motivation_letter_user_' . $i . '.pdf' : null,
                'participant_id' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}