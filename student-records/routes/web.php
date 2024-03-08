<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('dashboard');
});
Route::get('get_students', [UserController::class, 'get']);
Route::post('students', [UserController::class, 'store']);