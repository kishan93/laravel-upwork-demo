<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmissionCreateRequest;
use App\Models\Submission;

class SubmissionController extends Controller
{
    public function store(SubmissionCreateRequest $request)
    {
        return response()->json([
            'message' => 'Submission queued for processing',
        ], 201);
    }
}
