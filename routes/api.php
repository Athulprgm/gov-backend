<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Public routes for frontend data retrieval
Route::get('/districts', [DistrictController::class, 'index']);
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/timeline', [TimelineController::class, 'index']);
Route::get('/testimonials', [TestimonialController::class, 'index']);

// Public Blog & Profile routes
Route::get('/blogs', [BlogController::class, 'index']);
Route::get('/blogs/{id}', [BlogController::class, 'show']);
Route::get('/user/profile/{id}', [BlogController::class, 'showProfile']);

// Authentication routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Authenticated routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/upload', [UploadController::class, 'upload']);

    // User Profile CRUD
    Route::put('/user/profile', [BlogController::class, 'updateProfile']);

    // Blogs and Reactions CRUD
    Route::post('/blogs', [BlogController::class, 'store']);
    Route::delete('/blogs/{id}', [BlogController::class, 'destroy']);
    Route::post('/blogs/{id}/react', [BlogController::class, 'react']);

    // Districts CRUD
    Route::post('/districts', [DistrictController::class, 'store']);
    Route::put('/districts/{id}', [DistrictController::class, 'update']);
    Route::delete('/districts/{id}', [DistrictController::class, 'destroy']);

    // Projects CRUD
    Route::post('/projects', [ProjectController::class, 'store']);
    Route::put('/projects/{id}', [ProjectController::class, 'update']);
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy']);

    // Timeline CRUD
    Route::post('/timeline', [TimelineController::class, 'store']);
    Route::put('/timeline/{id}', [TimelineController::class, 'update']);
    Route::delete('/timeline/{id}', [TimelineController::class, 'destroy']);

    // Testimonials CRUD
    Route::post('/testimonials', [TestimonialController::class, 'store']);
    Route::put('/testimonials/{id}', [TestimonialController::class, 'update']);
    Route::delete('/testimonials/{id}', [TestimonialController::class, 'destroy']);
});
