<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;

// Load from controller
Route::get('/', [InventoryController::class, 'index'])->name('home');
Route::resource('inventory', InventoryController::class)->except(['show']);

// Contoh route di web.php
Route::get('/login', function () {
    return view('auth.login'); // Sesuaikan dengan nama dan lokasi file Anda
})->name('login'); // Memberi nama route agar mudah dipanggil

Route::fallback(function () {
    return redirect()->route('home')->with('error', 'Halaman tidak ditemukan.');
});

Route::get('/history', function () {
    // Sample history data for demonstration
    $history = [
        [
            'id' => 1,
            'item_name' => 'Product A',
            'action' => 'Stock Added',
            'quantity' => 20,
            'user' => 'Admin',
            'date' => '2025-04-10 09:30:45'
        ],
        [
            'id' => 2,
            'item_name' => 'Product C',
            'action' => 'Stock Reduced',
            'quantity' => 5,
            'user' => 'User1',
            'date' => '2025-04-15 14:22:30'
        ],
        [
            'id' => 3,
            'item_name' => 'Product B',
            'action' => 'Stock Added',
            'quantity' => 50,
            'user' => 'Admin',
            'date' => '2025-04-20 11:15:00'
        ],
        [
            'id' => 4,
            'item_name' => 'Product E',
            'action' => 'Product Updated',
            'quantity' => null,
            'user' => 'User2',
            'date' => '2025-04-22 16:40:12'
        ],
        [
            'id' => 5,
            'item_name' => 'Product D',
            'action' => 'Stock Reduced',
            'quantity' => 10,
            'user' => 'User1',
            'date' => '2025-04-28 13:05:22'
        ],
    ];
    
    return view('history', ['history' => $history]);
})->name('inventory.history');