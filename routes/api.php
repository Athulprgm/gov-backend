<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\BlogController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Production Ready Laravel API
|
*/

/*
|--------------------------------------------------------------------------
| Test Route
|--------------------------------------------------------------------------
*/

Route::get('/test', function () {
    return response()->json([
        'success' => true,
        'message' => 'Laravel Railway Backend Working'
    ]);
});

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Districts
Route::get('/districts', [DistrictController::class, 'index']);

// Projects
Route::get('/projects', [ProjectController::class, 'index']);

// Timeline
Route::get('/timeline', [TimelineController::class, 'index']);

// Testimonials
Route::get('/testimonials', [TestimonialController::class, 'index']);

// Blogs
Route::get('/blogs', [BlogController::class, 'index']);
Route::get('/blogs/{id}', [BlogController::class, 'show']);

// Public User Profile
Route::get('/user/profile/{id}', [BlogController::class, 'showProfile']);

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

// Register
Route::post('/register', [AuthController::class, 'register']);

// Login
Route::post('/login', [AuthController::class, 'login']);

/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | User Routes
    |--------------------------------------------------------------------------
    */

    Route::get('/user', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    /*
    |--------------------------------------------------------------------------
    | Upload Routes
    |--------------------------------------------------------------------------
    */

    Route::post('/upload', [UploadController::class, 'upload']);

    /*
    |--------------------------------------------------------------------------
    | User Profile Routes
    |--------------------------------------------------------------------------
    */

    Route::put('/user/profile', [BlogController::class, 'updateProfile']);

    /*
    |--------------------------------------------------------------------------
    | Blog Routes
    |--------------------------------------------------------------------------
    */

    // Create Blog
    Route::post('/blogs', [BlogController::class, 'store']);

    // Delete Blog
    Route::delete('/blogs/{id}', [BlogController::class, 'destroy']);

    // React to Blog
    Route::post('/blogs/{id}/react', [BlogController::class, 'react']);

    /*
    |--------------------------------------------------------------------------
    | District CRUD
    |--------------------------------------------------------------------------
    */

    Route::post('/districts', [DistrictController::class, 'store']);
    Route::put('/districts/{id}', [DistrictController::class, 'update']);
    Route::delete('/districts/{id}', [DistrictController::class, 'destroy']);

    /*
    |--------------------------------------------------------------------------
    | Project CRUD
    |--------------------------------------------------------------------------
    */

    Route::post('/projects', [ProjectController::class, 'store']);
    Route::put('/projects/{id}', [ProjectController::class, 'update']);
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy']);

    /*
    |--------------------------------------------------------------------------
    | Timeline CRUD
    |--------------------------------------------------------------------------
    */

    Route::post('/timeline', [TimelineController::class, 'store']);
    Route::put('/timeline/{id}', [TimelineController::class, 'update']);
    Route::delete('/timeline/{id}', [TimelineController::class, 'destroy']);

    /*
    |--------------------------------------------------------------------------
    | Testimonials CRUD
    |--------------------------------------------------------------------------
    */

    Route::post('/testimonials', [TestimonialController::class, 'store']);
    Route::put('/testimonials/{id}', [TestimonialController::class, 'update']);
    Route::delete('/testimonials/{id}', [TestimonialController::class, 'destroy']);
});