<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LoginController;

// Load from controller
Route::get('/', [InventoryController::class, 'index'])->name('home');
Route::resource('inventory', InventoryController::class)->except(['show']);

// Di routes/web.php
Route::get('/login', function () { // Anda bisa menggunakan URL yang lebih spesifik
    return view('auth.login');
})->name('login.form'); // Beri nama route

// Di routes/web.php
Route::post('/login/process', [LoginController::class, 'handleLogin'])->name('login.process');

Route::fallback(function () {
    return redirect()->route('home')->with('error', 'Halaman tidak ditemukan.');
});

Route::get('/inventory/history', [InventoryController::class, 'history'])->name('inventory.history');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');