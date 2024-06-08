<?php

namespace Database\Seeders;

use App\Models\Submission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubmissionSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        Submission::factory()->count(10)->create();
    }
}
