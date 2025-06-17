<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\MahasiswaAPIController;
use App\Http\Controllers\API\DosenAPIController;
use App\Http\Controllers\API\MakulAPIController;

// Routes yang tidak memerlukan autentikasi
Route::post('/login', [AuthController::class, 'login']);

// Routes dengan autentikasi
Route::middleware('auth:sanctum')->group(function() {
    // User profile
    Route::get('/user/profile', function(Request $request) {
        return response()->json([
            'status' => 'success',
            'data' => $request->user()
        ]);
    });
    
    // Auth routes
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // CRUD Mahasiswa routes
    Route::apiResource('mahasiswa', MahasiswaAPIController::class);
    Route::post('/mahasiswa', [MahasiswaAPIController::class, 'store'])->name('api.mahasiswa.store');
    Route::get('/mahasiswa', [MahasiswaAPIController::class, 'index'])->name('api.mahasiswa.index');
    
    // CRUD Dosen routes
    Route::apiResource('dosen', DosenAPIController::class);
    
    // CRUD Mata Kuliah routes
    Route::apiResource('makul', MakulAPIController::class);
});

// Public API routes (optional)
Route::get('/public/mahasiswa', [MahasiswaAPIController::class, 'index']);
Route::get('/public/dosen', [DosenAPIController::class, 'index']);
Route::get('/public/makul', [MakulAPIController::class, 'index']);
