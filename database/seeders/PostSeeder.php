<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        Post::truncate();
        $titles = [
            'Software Developer',
            'Web Designer',
            'Data Analyst',
            'Marketing Specialist',
            'Project Manager',
            'UX/UI Designer',
            'DevOps Engineer',
            'Content Writer',
            'Graphic Designer',
            'Network Administrator'
        ];

        $descriptions = [
            'Looking for an experienced software developer',
            'Creative web designer needed for our team',
            'Data analyst with SQL and Python skills',
            'Marketing specialist for digital campaigns',
            'Project manager with agile experience',
            'UX/UI designer for mobile applications',
            'DevOps engineer with AWS experience',
            'Content writer for tech blog',
            'Graphic designer for branding materials',
            'Network administrator for office infrastructure'
        ];

        for ($i = 0; $i < 10; $i++) {
            DB::table('posts')->insert([
                'title' => $titles[$i],
                'description' => $descriptions[$i],
                'expired_date' => Carbon::now()->addDays(rand(30, 90)),
                'operator_id' => rand(2, 8), // Random operator user
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}