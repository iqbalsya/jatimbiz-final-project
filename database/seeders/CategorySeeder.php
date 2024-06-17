<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Makanan'],
            ['name' => 'Minuman'],
            ['name' => 'Kerajinan'],
            ['name' => 'Fashion'],
            ['name' => 'Elektronik'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
