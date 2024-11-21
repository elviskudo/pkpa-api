<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\Home\CourseController as HomeCourseController;
use App\Http\Controllers\Admin\ForumController as AdminForumController;
use App\Http\Controllers\Admin\UniversityController as AdminUniversityController;
use App\Http\Controllers\Api\AuthController;

Route::get('/', function () {
    return view('welcome to the PKPA API');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api');
    Route::post('/profile', [AuthController::class, 'profile'])->middleware('auth:api');
});

// Group untuk admin routes
Route::prefix('admin')->name('admin.')->middleware(['auth:api'])->group(function () {
    Route::get('/universities', [AdminUniversityController::class, 'list']);
    Route::get('/forums', [AdminForumController::class, 'list']);
    Route::post('/forums', [AdminForumController::class, 'create']);
});

Route::prefix('home')->name('home.')->group(function () {
    Route::get('/course', [HomeCourseController::class, 'list']);
});


Route::post('/upload', [UploadController::class, 'upload']);
