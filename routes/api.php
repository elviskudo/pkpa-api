<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\Home\CourseController as HomeCourseController;
use App\Http\Controllers\Admin\ForumController as AdminForumController;
use App\Http\Controllers\Admin\UniversityController as AdminUniversityController;
<<<<<<< HEAD
use App\Http\Controllers\Api\AuthController;
=======
use App\Http\Controllers\Home\FaceController as HomeFaceController;
use App\Http\Controllers\Admin\FaceController as AdminFaceController;
>>>>>>> d9109c2592261f307928de2b9d54a6c873ca3d1c

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
    Route::post('/add-user',[HomeFaceController::class,'create']);
});
<<<<<<< HEAD
=======

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/universities', [AdminUniversityController::class, 'list']);
    Route::get('/forums', [AdminForumController::class, 'list']);
    Route::post('/forums', [AdminForumController::class, 'create']);
    Route::post('/face',[AdminFaceController::class,'list']);
    Route::put('/edit-face',[AdminFaceController::class,'edit']);
    Route::delete('/delete-face',[AdminFaceController::class,'delete']);
    // Route::prefix('admin')->name('admin.')->middleware(['auth:jwt'])->group(function () {
});
Route::post('/upload', [UploadController::class, 'upload']);
>>>>>>> d9109c2592261f307928de2b9d54a6c873ca3d1c


Route::post('/upload', [UploadController::class, 'upload']);
