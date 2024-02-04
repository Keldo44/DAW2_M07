<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('carts')->insert([
            [
                'client' => 2,
                'product' => 2,
                'amount' => 99,
            ],
            [
                'client' => 2,
                'product' => 1,
                'amount' => 99,
            ],

        ]);
    }
}
