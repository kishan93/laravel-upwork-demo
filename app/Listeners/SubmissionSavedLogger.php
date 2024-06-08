<?php

namespace App\Listeners;

use App\Events\SubmissionSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class SubmissionSavedLogger implements ShouldQueue
{
    public function handle(SubmissionSaved $event): void
    {
        $submission = $event->getSubmission();

        Log::info('Submission saved', [
            'name' => $submission->name,
            'email' => $submission->email,
            'message' => $submission->message,
        ]);
    }
}
