<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inventory;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'item' => 'Product A',
                'category' => 'Electronics',
                'quantity' => 50,
                'price' => 300, // stored as integer (e.g. 299.99 => 29999)
            ],
            [
                'item' => 'Product B',
                'category' => 'Office Supplies',
                'quantity' => 120,
                'price' => 50,
            ],
            [
                'item' => 'Product C',
                'category' => 'Furniture',
                'quantity' => 15,
                'price' => 600,
            ],
            [
                'item' => 'Product D',
                'category' => 'Electronics',
                'quantity' => 35,
                'price' => 150,
            ],
            [
                'item' => 'Product E',
                'category' => 'Office Supplies',
                'quantity' => 80,
                'price' => 30,
            ],
        ];

        foreach ($data as $item) {
            Inventory::create($item);
        }
    }
}
