<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MakulController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Tambahkan grup rute web berikut
Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Rute web untuk Mahasiswa
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store'); 
    Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
    Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
    Route::get('/mahasiswa/{id}/delete', [MahasiswaController::class, 'delete'])->name('mahasiswa.delete');
    
    // Rute web untuk Dosen
    Route::get('/dosen', [DosenController::class, 'index'])->name('dosen.index');
    Route::post('/dosen', [DosenController::class, 'store'])->name('dosen.store');
    Route::get('/dosen/{id}/edit', [DosenController::class, 'edit'])->name('dosen.edit');
    Route::put('/dosen/{id}', [DosenController::class, 'update'])->name('dosen.update');
    Route::get('/dosen/{id}/delete', [DosenController::class, 'delete'])->name('dosen.delete');
    
    // Rute web untuk Makul
    Route::get('/makul', [MakulController::class, 'index'])->name('makul.index');
    Route::post('/makul', [MakulController::class, 'store'])->name('makul.store');
    Route::get('/makul/{id}/edit', [MakulController::class, 'edit'])->name('makul.edit');
    Route::put('/makul/{id}', [MakulController::class, 'update'])->name('makul.update');
    Route::get('/makul/{id}/delete', [MakulController::class, 'delete'])->name('makul.delete');
});

require __DIR__.'/auth.php';
