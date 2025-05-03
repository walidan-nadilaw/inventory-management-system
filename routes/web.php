<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;

// Define the inventory data at the top level so it's accessible to all routes
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

Route::get('/', function () {
    return view('welcome');
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

Route::get('/home', function () use ($inventory) {
    return view('home', ['inventory' => $inventory]);
});

Route::get('/inventory/create', function () {
    return view('create'); // Or 'inventory.create' if using folders
})->name('inventory.create');

// Route for edit form
Route::get('/inventory/{id}/edit', function ($id) use ($inventory) {
    // Find item by ID
    $item = collect($inventory)->firstWhere('id', $id);
    if (!$item) {
        abort(404);
    }
    return view('edit', ['item' => $item]); // Or 'inventory.edit' if using folders
})->name('inventory.edit');

// Routes for form submissions (POST, PUT, DELETE)
// These are dummy routes that will redirect back to dashboard
Route::post('/inventory', function () {
    return redirect('home')->with('success', 'Item added successfully!');
})->name('inventory.store');

Route::put('/inventory/{id}', function ($id) {
    return redirect('home')->with('success', 'Item updated successfully!');
})->name('inventory.update');

Route::get('/inventory', function () use ($inventory) {
    return view('home', ['inventory' => $inventory]);
})->name('inventory.index');