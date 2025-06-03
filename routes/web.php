<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LoginController;

Route::middleware('auth')->group(function () {
    Route::get('/', [InventoryController::class, 'index'])->name('home');
    Route::resource('inventory', InventoryController::class)->except(['show']);
    Route::get('/inventory/history', [InventoryController::class, 'history'])->name('inventory.history');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Login routes remain outside the auth middleware
Route::get('/login', function () {
    return view('auth.login');
})->name('login.form');

Route::post('/login/process', [LoginController::class, 'handleLogin'])->name('login.process');

Route::fallback(function () {
    return redirect()->route('login.form')->with('error', 'Halaman tidak ditemukan.');
});