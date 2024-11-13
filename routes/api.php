<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\Home\CourseController as HomeCourseController;
use App\Http\Controllers\Admin\ForumController as AdminForumController;
use App\Http\Controllers\Admin\UniversityController as AdminUniversityController;

Route::get('/', function () {
    return view('welcome to the PKPA API');
});

Route::prefix('auth')->name('auth.')->namespace('Auth')->group(function () {
});

Route::prefix('home')->name('home.')->group(function () {
    Route::get('/course', [HomeCourseController::class, 'list']);
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/universities', [AdminUniversityController::class, 'list']);
    Route::get('/forums', [AdminForumController::class, 'list']);
    // Route::prefix('admin')->name('admin.')->middleware(['auth:jwt'])->group(function () {
});
Route::post('/upload', [UploadController::class, 'upload']);

