<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PeminjamanController;
use App\Http\Controllers\API\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Public Routes
Route::post('/login', [AuthController::class, 'login']);

// Protected Routes
Route::middleware('auth:sanctum')->group(function () {
    // Auth Route
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // Peminjaman Routes
    Route::get('/peminjaman', [PeminjamanController::class, 'index']);          // Get all
    Route::get('/peminjaman/{id}', [PeminjamanController::class, 'show']);      // Get specific
}); 