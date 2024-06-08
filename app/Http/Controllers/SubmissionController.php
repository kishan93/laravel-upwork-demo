<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmissionCreateRequest;
use App\Jobs\ProcessSubmission;

class SubmissionController extends Controller
{
    public function store(SubmissionCreateRequest $request)
    {

        ProcessSubmission::dispatch($request->validated());

        return response()->json([
            'message' => 'Submission queued for processing',
        ], 201);
    }
}
