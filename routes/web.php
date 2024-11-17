<?php

use App\Http\Controllers\bukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    // profile route
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // kategori route
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/{id}', [KategoriController::class, 'show'])->name('kategori.detail');
    Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
    // buku route
    Route::get('/buku', [bukuController::class, 'index'])->name('buku.index');
    Route::get('/buku/create', [bukuController::class, 'create'])->name('buku.create');
    Route::post('/buku', [bukuController::class, 'store'])->name('buku.store');
    Route::get('/buku/{id}', [bukuController::class, 'show'])->name('buku.detail');
    Route::get('/buku/{id}/edit', [bukuController::class, 'edit'])->name('buku.edit');
    Route::put('/buku/{id}', [bukuController::class, 'update'])->name('buku.update');
    Route::delete('/buku/{id}', [bukuController::class, 'destroy'])->name('buku.destroy');

    
});

require __DIR__ . '/auth.php';
