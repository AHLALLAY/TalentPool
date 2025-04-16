<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicationSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = ['in proccess', 'accepted', 'rejected'];

        // Create applications for each post
        for ($postId = 1; $postId <= 10; $postId++) {
            $applicantsCount = rand(3, 8);
            
            // Get random participants who haven't applied to this post yet
            $participants = range(9, 20); // Participant user IDs
            shuffle($participants);
            $selectedParticipants = array_slice($participants, 0, $applicantsCount);
            
            foreach ($selectedParticipants as $participantId) {
                DB::table('applications')->insert([
                    'post_id' => $postId,
                    'participant_id' => $participantId,
                    'status' => $statuses[rand(0, 2)],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}