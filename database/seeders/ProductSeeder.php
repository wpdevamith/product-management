<?php

namespace Database\Seeders;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
{
    Product::create([
        'product_id' => 'P001',
        'name' => 'Product 1',
        'description' => 'Description for product 1.',
        'price' => 100.00,
        'stock' => 50,
        'image' => 'img.jpg',
    ]);

    Product::create([
        'product_id' => 'P002',
        'name' => 'Product 2',
        'description' => 'Description for product 2.',
        'price' => 150.00,
        'stock' => 30,
        'image' => 'storage/images/img.jpg',
    ]);

    Product::create([
        'product_id' => 'P003',
        'name' => 'Product 3',
        'description' => 'Description for product 3.',
        'price' => 200.00,
        'stock' => 20,
        'image' => 'public/storage/images/img.jpg',
    ]);

    Product::create([
        'product_id' => 'P004',
        'name' => 'Product 4',
        'description' => 'Description for product 4.',
        'price' => 250.00,
        'stock' => 15,
        'image' => 'images/img.jpg',
    ]);

    Product::create([
        'product_id' => 'P005',
        'name' => 'Product 5',
        'description' => 'Description for product 5.',
        'price' => 300.00,
        'stock' => 10,
        'image' => 'images/img.jpg',
    ]);
}
}
