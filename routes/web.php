<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseManagementController;

Route::post('/create', [CourseManagementController::class, 'store']);

Route::get('/', function () {
    return view('welcome');
});
