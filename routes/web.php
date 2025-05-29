<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// User
Route::middleware('auth')->group(function() {
    Route::get('/feedbacks', [feedbackController::class, 'index'])->name('feedbacks.index');
    Route::get('/feedbacks/create', [feedbackController::class, 'create'])->name('feedbacks.create');
    Route::post('/feedbacks', [feedbackController::class, 'store'])->name('feedbacks.store');
    Route::get('/feedbacks/{feedback}', [feedbackController::class, 'show'])->name('feedbacks.show');
});

// Admin
Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('/admin/feedbacks', [feedbackController::class, 'adminIndex'])->name('admin.feedbacks.index');
    Route::post('/admin/feedbacks/{feedback}', [feedbackController::class, 'update'])->name('admin.feedbacks.update');
});