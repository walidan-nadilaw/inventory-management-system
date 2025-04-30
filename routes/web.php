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
