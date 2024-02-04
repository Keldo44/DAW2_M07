<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Product 1',
            'description' => 'Description for Product 1',
            'stock' => 10,
            'category' => 2,
            'price' => 29.99,
        ]);

        Product::create([
            'name' => 'Product 2',
            'description' => 'Description for Product 2',
            'stock' => 15,
            'category' => 1,
            'price' => 39.99,
        ]);
    }
}
