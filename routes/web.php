<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PeminjamanController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');
Route::resource('users', UserController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function() {
    Route::get('/feedback/create/{peminjaman_id}', [FeedbackController::class, 'create'])->name('feedbacks.create');
    Route::post('/feedback/store', [FeedbackController::class, 'store'])->name('feedbacks.store');

    
});

Route::get('/admin/feedbacks', [FeedbackController::class, 'index'])->name('feedbacks.index');


Route::middleware(['auth'])->group(function () {
    Route::get('/mahasiswa/peminjaman', [PeminjamanController::class, 'index'])->name('mahasiswa.peminjaman.index');
    Route::get('/mahasiswa/peminjaman/create', [PeminjamanController::class, 'create'])->name('mahasiswa.peminjaman.create');
    Route::post('/mahasiswa/peminjaman', [PeminjamanController::class, 'store'])->name('mahasiswa.peminjaman.store');
    
});