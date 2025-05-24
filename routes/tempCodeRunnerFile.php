<?php
use Illuminate\Support\Facades\Hash;

Route::get('/generate-hash', function () {
    return Hash::make('user123'); // Ganti 'user123' kalau mau password lain
});