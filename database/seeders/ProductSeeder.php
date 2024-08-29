<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = DB::table('categories')->pluck('id');

        DB::table('products')->insert([
            [
                'title' => 'Product 1',
                'description' => 'This is a description for Product 1',
                'sku' => Str::random(8),
                'price' => 19.99,
                'category_id' => $categories->random(), 
            ],
            [
                'title' => 'Product 2',
                'description' => 'This is a description for Product 2',
                'sku' => Str::random(8), 
                'price' => 29.99,
                'category_id' => $categories->random(),
            ],
            [
                'title' => 'Product 3',
                'description' => 'This is a description for Product 3',
                'sku' => Str::random(8), 
                'price' => 39.99,
                'category_id' => $categories->random(), 
            ],
            [
                'title' => 'Product 4',
                'description' => 'This is a description for Product 4',
                'sku' => Str::random(8), 
                'price' => 39.99,
                'category_id' => $categories->random(), 
            ],
            [
                'title' => 'Product 5',
                'description' => 'This is a description for Product 5',
                'sku' => Str::random(8), 
                'price' => 39.99,
                'category_id' => $categories->random(), 
            ],
            [
                'title' => 'Product 6',
                'description' => 'This is a description for Product 6',
                'sku' => Str::random(8), 
                'price' => 39.99,
                'category_id' => $categories->random(), 
            ],
            [
                'title' => 'Product 7',
                'description' => 'This is a description for Product 7',
                'sku' => Str::random(8), 
                'price' => 39.99,
                'category_id' => $categories->random(), 
            ],
            [
                'title' => 'Product 8',
                'description' => 'This is a description for Product 8',
                'sku' => Str::random(8), 
                'price' => 39.99,
                'category_id' => $categories->random(), 
            ],
            [
                'title' => 'Product 9',
                'description' => 'This is a description for Product 9',
                'sku' => Str::random(8), 
                'price' => 39.99,
                'category_id' => $categories->random(), 
            ],
            [
                'title' => 'Product 10',
                'description' => 'This is a description for Product 10',
                'sku' => Str::random(8), 
                'price' => 39.99,
                'category_id' => $categories->random(), 
            ],
        ]);
    }
}
