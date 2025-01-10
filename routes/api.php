<?php

use App\Http\Controllers\Admin\BatchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\Home\CourseController as HomeCourseController;
use App\Http\Controllers\Admin\ForumController as AdminForumController;
use App\Http\Controllers\Admin\UniversityController as AdminUniversityController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Home\FaceController as HomeFaceController;
use App\Http\Controllers\Admin\FaceController as AdminFaceController;

use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TopicController;
use App\Http\Controllers\Admin\UploadFilesController;

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
    Route::get('/compare/{email}', [HomeFaceController::class, 'compare']);
    Route::post('/create',[HomeFaceController::class,'create']);
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/universities', [AdminUniversityController::class, 'list']);
    Route::post('/universities/create', [AdminUniversityController::class, 'create']);
    Route::put('/universities/update/{id}', [AdminUniversityController::class, 'update']);
    Route::get('/forums', [AdminForumController::class, 'list']);
    Route::post('/forums', [AdminForumController::class, 'create']);
    Route::get('/face',[AdminFaceController::class,'list']);
    Route::put('/edit-face',[AdminFaceController::class,'edit']);
    Route::delete('/delete-face',[AdminFaceController::class,'delete']);
    Route::get('/courses', [AdminCourseController::class, 'list']);
    Route::post('/courses', [AdminCourseController::class, 'store']);
    Route::put('/courses/{id}', [AdminCourseController::class, 'update']);
    // -- ROUTES UNTUK TOPIC --
    Route::prefix('topics')->group(function () {
        Route::get('/', [TopicController::class, 'list']);
        Route::post('/', [TopicController::class, 'store']);
        Route::put('/{id}', [TopicController::class, 'update']);
        Route::delete('/{id}', [TopicController::class, 'destroy']);
    });
    Route::prefix('batches')->group(function () {
        Route::get('/', [BatchController::class, 'list']);
        Route::post('/', [BatchController::class, 'store']);
        Route::put('/{id}', [BatchController::class, 'update']);
        Route::delete('/{id}', [BatchController::class, 'destroy']);
    });
    Route::prefix('upload-files')->group(function () {
        Route::get('/', [UploadFilesController::class, 'list']);
        Route::post('/', [UploadFilesController::class, 'store']);
        Route::put('/{id}', [UploadFilesController::class, 'update']);
        Route::delete('/{id}', [UploadFilesController::class, 'destroy']);
    });
    Route::get('/students', [StudentController::class, 'list']);
    Route::post('/students', [StudentController::class, 'create']);
    Route::put('/students/{id}', [StudentController::class, 'update']);
    Route::delete('/students/{id}', [StudentController::class, 'delete']);
    // Route::prefix('admin')->name('admin.')->middleware(['auth:jwt'])->group(function () {
});
Route::post('/upload', [UploadController::class, 'upload']);



Route::post('/upload', [UploadController::class, 'upload']);
