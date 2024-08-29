<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'title' => 'Electronics',
            'description' => 'Devices and gadgets',
        ]);

        Category::create([
            'title' => 'Clothing',
            'description' => 'Men and Women clothing',
        ]);

        Category::create([
            'title' => 'Books',
            'description' => 'Books of various genres',
        ]);
    }
}
