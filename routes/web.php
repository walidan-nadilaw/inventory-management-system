<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;

// Load from controller
Route::get('/', [InventoryController::class, 'index'])->name('home');
Route::resource('inventory', InventoryController::class)->except(['show']);
