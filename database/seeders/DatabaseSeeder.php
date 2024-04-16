<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Product 1',
                'price' => 10,
                'description' => 'This is the description for Product 1.',
            ],
            [
                'name' => 'Product 2',
                'price' => 19.08,
                'description' => 'This is the description for Product 2.',
            ],
            [
                'name' => 'Product 3',
                'price' => 29.12,
                'description' => 'This is the description for Product 3.',
            ],
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }
    }
}
