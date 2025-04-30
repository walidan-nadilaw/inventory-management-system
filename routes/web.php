<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    // Sample inventory data for demonstration
    $inventory = [
        [
            'id' => 1,
            'name' => 'Product A',
            'category' => 'Electronics',
            'quantity' => 50,
            'price' => 299.99,
            'last_updated' => '2025-04-25'
        ],
        [
            'id' => 2,
            'name' => 'Product B',
            'category' => 'Office Supplies',
            'quantity' => 120,
            'price' => 49.99,
            'last_updated' => '2025-04-28'
        ],
        [
            'id' => 3,
            'name' => 'Product C',
            'category' => 'Furniture',
            'quantity' => 15,
            'price' => 599.99,
            'last_updated' => '2025-04-30'
        ],
        [
            'id' => 4,
            'name' => 'Product D',
            'category' => 'Electronics',
            'quantity' => 35,
            'price' => 149.99,
            'last_updated' => '2025-04-29'
        ],
        [
            'id' => 5,
            'name' => 'Product E',
            'category' => 'Office Supplies',
            'quantity' => 80,
            'price' => 29.99,
            'last_updated' => '2025-04-26'
        ],
    ];
    
    return view('home', ['inventory' => $inventory]);
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