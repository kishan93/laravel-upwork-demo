<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::post('/submission', [Controllers\SubmissionController::class, 'store']);
