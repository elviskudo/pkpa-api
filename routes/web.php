<?php

use App\Http\Controllers\FaceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Face Controller
Route::get('/face',[FaceController::class,'list']);
Route::post('/face',[FaceController::class,'create']);
