<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\GedungController;
use App\Http\Controllers\Admin\PeminjamanAdminController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::resource('users', UserController::class)->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/feedbacks', [FeedbackController::class, 'index'])->name('feedbacks.index');
    Route::get('/feedbacks/create', [FeedbackController::class, 'create'])->name('feedbacks.create');
    Route::post('/feedbacks', [FeedbackController::class, 'store'])->name('feedbacks.store');
    Route::get('/feedbacks/{feedback}', [FeedbackController::class, 'show'])->name('feedbacks.show');

    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/feedbacks', [FeedbackController::class, 'adminIndex'])->name('admin.feedback.index');
    Route::post('/admin/feedbacks/{feedback}', [FeedbackController::class, 'update'])->name('admin.feedbacks.update');

    Route::get('/admin/ruangan', [RuanganController::class, 'index'])->name('ruangan.index');
    Route::get('/admin/ruangan/create', [RuanganController::class, 'create'])->name('ruangan.create');
    Route::post('/admin/ruangan', [RuanganController::class, 'store'])->name('ruangan.store');
    Route::get('/admin/ruangan/{ruangan}/edit', [RuanganController::class, 'edit'])->name('ruangan.edit');
    Route::put('/admin/ruangan/{ruangan}', [RuanganController::class, 'update'])->name('ruangan.update');
    Route::delete('/admin/ruangan/{ruangan}', [RuanganController::class, 'destroy'])->name('ruangan.destroy');

    Route::get('/admin/gedung', [GedungController::class, 'index'])->name('gedung.index');
    Route::get('/admin/gedung/create', [GedungController::class, 'create'])->name('gedung.create');
    Route::post('/admin/gedung', [GedungController::class, 'store'])->name('gedung.store');
    Route::get('/admin/gedung/{gedung}/edit', [GedungController::class, 'edit'])->name('gedung.edit');
    Route::put('/admin/gedung/{gedung}', [GedungController::class, 'update'])->name('gedung.update');
    Route::delete('/admin/gedung/{gedung}', [GedungController::class, 'destroy'])->name('gedung.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/mahasiswa/peminjaman', [PeminjamanController::class, 'index'])->name('mahasiswa.peminjaman.index');
    Route::get('/mahasiswa/peminjaman/create', [PeminjamanController::class, 'create'])->name('mahasiswa.peminjaman.create');
    Route::post('/mahasiswa/peminjaman', [PeminjamanController::class, 'store'])->name('mahasiswa.peminjaman.store');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/peminjaman', [PeminjamanAdminController::class, 'index'])->name('admin.peminjaman.index');
    Route::post('/admin/peminjaman/{id}/acc', [PeminjamanAdminController::class, 'approve'])->name('admin.peminjaman.acc');
    Route::post('/admin/peminjaman/{id}/tolak', [PeminjamanAdminController::class, 'reject'])->name('admin.peminjaman.reject');
});