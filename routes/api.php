<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\Home\CourseController as HomeCourseController;
use App\Http\Controllers\Admin\ForumController as AdminForumController;
use App\Http\Controllers\Admin\UniversityController as AdminUniversityController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Home\FaceController as HomeFaceController;
use App\Http\Controllers\Admin\FaceController as AdminFaceController;

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
    Route::post('/universities/create', [AdminUniversityController::class, 'create']);
    Route::get('/forums', [AdminForumController::class, 'list']);
    Route::post('/forums', [AdminForumController::class, 'create']);
});

Route::prefix('home')->name('home.')->group(function () {
    Route::get('/course', [HomeCourseController::class, 'list']);
    Route::post('/add-user',[HomeFaceController::class,'create']);
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/universities', [AdminUniversityController::class, 'list']);
    Route::post('/universities/create', [AdminUniversityController::class, 'create']);
    Route::put('/universities/update/{id}', [AdminUniversityController::class, 'update']);
    Route::get('/forums', [AdminForumController::class, 'list']);
    Route::post('/forums', [AdminForumController::class, 'create']);
    Route::post('/face',[AdminFaceController::class,'list']);
    Route::put('/edit-face',[AdminFaceController::class,'edit']);
    Route::delete('/delete-face',[AdminFaceController::class,'delete']);
    // Route::prefix('admin')->name('admin.')->middleware(['auth:jwt'])->group(function () {
});
Route::post('/upload', [UploadController::class, 'upload']);


Route::post('/upload', [UploadController::class, 'upload']);
