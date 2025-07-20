<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Student Route
Route::get('/', [StudentController::class, 'index']);
Route::post('/student/store', [StudentController::class, 'store']);