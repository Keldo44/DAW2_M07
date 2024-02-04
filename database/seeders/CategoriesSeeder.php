<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Seed categories
         DB::table('categories')->insert([
            [
                'name' => 'Category 1',
                'description' => 'Description for Category 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Category 2',
                'description' => 'Description for Category 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Category 3',
                'description' => 'Description for Category 3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more categories as needed
        ]);
    }
}
