<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('items', ItemController::class)->only([
    'index', 'store', 'update', 'destroy'
]);
