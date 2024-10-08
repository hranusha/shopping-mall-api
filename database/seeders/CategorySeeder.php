<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'title' => 'Electronics',
                'description' => 'Devices and gadgets',
            ],
            [
                'title' => 'Clothing',
                'description' => 'Men and Women clothing',
            ],
            [
                'title' => 'Books',
                'description' => 'Books of various genres',
            ]
        ]);
    }
}
