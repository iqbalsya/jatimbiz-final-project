<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            ['name' => 'Produk A', 'description' => 'Deskripsi Produk A', 'price' => 10000, 'merchant_id' => 1, 'category_id' => 1],
            ['name' => 'Produk B', 'description' => 'Deskripsi Produk B', 'price' => 20000, 'merchant_id' => 2, 'category_id' => 2],
            ['name' => 'Produk C', 'description' => 'Deskripsi Produk C', 'price' => 30000, 'merchant_id' => 3, 'category_id' => 3],
            ['name' => 'Produk D', 'description' => 'Deskripsi Produk D', 'price' => 40000, 'merchant_id' => 4, 'category_id' => 4],
            ['name' => 'Produk E', 'description' => 'Deskripsi Produk E', 'price' => 50000, 'merchant_id' => 5, 'category_id' => 5],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
