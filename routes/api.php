<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome to the PKPA API');
});

Route::prefix('auth')->name('auth.')->namespace('Auth')->group(function () {
});

Route::prefix('admin')->name('admin.')->middleware(['auth:jwt'])->group(function () {
});