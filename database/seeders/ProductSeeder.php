<?php

namespace Database\Seeders;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{


public function run(): void
{
    Product::create([
        'name' => 'iPhone 15',
        'price' => 250000,
        'stock' => 10,
        'barcode' => 'IP15-001',
        'category_id' => 1
    ]);

    Product::create([
        'name' => 'Samsung S24',
        'price' => 200000,
        'stock' => 15,
        'barcode' => 'SS24-001',
        'category_id' => 1
    ]);
}
}










    

