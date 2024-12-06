<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            ['name' => 'Product 1', 'description' => 'Description for product 1', 'price' => 100.00, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Product 2', 'description' => 'Description for product 2', 'price' => 150.00, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Product 3', 'description' => 'Description for product 3', 'price' => 200.00, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
