<?php

namespace Tests\Feature;

use App\Jobs\ProcessSubmission;
use App\Models\Submission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class SubmissionTest extends TestCase
{

    use RefreshDatabase;

    public function test_submission_create_dispatches_job(): void
    {
        Queue::fake();

        $data = Submission::factory()->make()->toArray();
        $response = $this->postJson('/api/submission', $data);
        $response->assertStatus(201);

        Queue::assertPushed(ProcessSubmission::class, function ($job) {
            $job->handle();
            return true;
        });

        $this->assertDatabaseHas('submissions', $data);
    }
}
