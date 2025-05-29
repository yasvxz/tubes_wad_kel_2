<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\RuanganController;



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');
Route::resource('users', UserController::class);
Route::resource('ruangan', RuanganController::class);

Route::get('/', [RuanganController::class, 'index']);

Route::middleware('auth')->group(function() {
    Route::get('/feedbacks', [FeedbackController::class, 'index'])->name('feedbacks.index');
    Route::get('/feedbacks/create', [FeedbackController::class, 'create'])->name('feedbacks.create');
    Route::post('/feedbacks', [FeedbackController::class, 'store'])->name('feedbacks.store');
    Route::get('/feedbacks/{feedback}', [feedbackController::class, 'show'])->name('feedbacks.show');
});

Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('/admin/feedbacks', [FeedbackController::class, 'adminIndex'])->name('admin.feedbacks.index');
    Route::post('/admin/feedbacks/{feedback}', [FeedbackController::class, 'update'])->name('admin.feedbacks.update');
});