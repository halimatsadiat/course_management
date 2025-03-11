<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseManagementController;

Route::get('/course', [CourseManagementController::class, 'index'])->name('course.index');
Route::post('/store', [CourseManagementController::class, 'store'])->name('course.store');
Route::get('/edit/{id}', [CourseManagementController::class, 'edit'])->name('course.edit');
Route::put('/update/{id}', [CourseManagementController::class, 'update'])->name('course.update');
Route::delete('/delete/{id}', [CourseManagementController::class, 'destroy'])->name('course.destroy');

