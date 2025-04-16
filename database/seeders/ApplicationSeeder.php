<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Participant;

class ApplicationSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('applications')->truncate();
        
        $statuses = ['in process', 'accepted', 'rejected'];
        $participantIds = Participant::pluck('id')->toArray();

        for ($postId = 1; $postId <= 10; $postId++) {
            $applicantsCount = rand(3, min(8, count($participantIds)));
            shuffle($participantIds);
            
            foreach (array_slice($participantIds, 0, $applicantsCount) as $participantId) {
                DB::table('applications')->insert([
                    'post_id' => $postId,
                    'participant_id' => $participantId,
                    'status' => $statuses[array_rand($statuses)],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}