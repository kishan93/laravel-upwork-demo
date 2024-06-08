<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmissionCreateRequest;
use App\Jobs\ProcessSubmission;
use App\Models\Submission;

class SubmissionController extends Controller
{
    public function store(SubmissionCreateRequest $request)
    {
        $submission = new Submission();
        $submission->fill($request->validated());

        ProcessSubmission::dispatch($submission);

        return response()->json([
            'message' => 'Submission queued for processing',
        ], 201);
    }
}
