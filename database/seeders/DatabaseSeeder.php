<?php

namespace Database\Seeders;

use App\Models\Inventory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $data = [
            [
                'item' => 'Product A',
                'category' => 'Elektronik',
                'quantity' => 50,
                'price' => 300000, // stored as integer (e.g. 299.99 => 29999)
            ],
            [
                'item' => 'Product B',
                'category' => 'Alat tulis',
                'quantity' => 120,
                'price' => 5000,
            ],
            [
                'item' => 'Product C',
                'category' => 'Kesehatan',
                'quantity' => 15,
                'price' => 60000,
            ],
            [
                'item' => 'Product D',
                'category' => 'Elektronik',
                'quantity' => 35,
                'price' => 150000,
            ],
            [
                'item' => 'Product E',
                'category' => 'Alat tulis',
                'quantity' => 80,
                'price' => 3000,
            ],
        ];

        foreach ($data as $item) {
            Inventory::create($item);
        }
    }
}





