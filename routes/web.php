<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\MakulController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// MAHASISWA
Route::get('/mahasiswa/read', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
Route::post('/mahasiswa/create', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::get('/mahasiswa/update/{id}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
Route::post('/mahasiswa/update/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
Route::get('/mahasiswa/delete/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.delete');

// DOSEN
Route::get('/dosen/read', [DosenController::class, 'index'])->name('dosen.index');
Route::get('/dosen/create', [DosenController::class, 'create'])->name('dosen.create');
Route::post('/dosen/create', [DosenController::class, 'store'])->name('dosen.store');
Route::get('/dosen/update/{id}', [DosenController::class, 'edit'])->name('dosen.edit');
Route::post('/dosen/update/{id}', [DosenController::class, 'update'])->name('dosen.update');
Route::get('/dosen/delete/{id}', [DosenController::class, 'destroy'])->name('dosen.delete');

// MAKUL
Route::get('/makul/read', [MakulController::class, 'index'])->name('makul.index');
Route::get('/makul/create', [MakulController::class, 'create'])->name('makul.create');
Route::post('/makul/create', [MakulController::class, 'store'])->name('makul.store');
Route::get('/makul/update/{id}', [MakulController::class, 'edit'])->name('makul.edit');
Route::post('/makul/update/{id}', [MakulController::class, 'update'])->name('makul.update');
Route::get('/makul/delete/{id}', [MakulController::class, 'destroy'])->name('makul.delete');

require __DIR__.'/auth.php';
