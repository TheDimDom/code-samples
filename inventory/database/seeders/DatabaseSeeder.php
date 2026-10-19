<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Stormtrooper Figure',
                'sku' => 'TEST-001',
                'price' => 24.99,
                'stock' => 8,
            ],
            [
                'name' => 'Dragon Ornament',
                'sku' => 'TEST-002',
                'price' => 19.99,
                'stock' => 3,
            ],
            [
                'name' => 'Harry Potter Mug',
                'sku' => 'TEST-003',
                'price' => 12.99,
                'stock' => 0,
            ],
        ]);
    }
}
