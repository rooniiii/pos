<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_can_be_created()
    {
        
        $category = Category::create([
            'name' => 'Electronics'
        ]);

        
        $response = $this->post('/products', [
            'name' => 'HP Laptop',
            'price' => '50000',
            'stock' => '10',
            'barcode' => '123456',
            'category_id' => $category->id,
        ]);

        
        $response->assertRedirect(route('products.index'));

        
        $this->assertDatabaseHas('products', [
            'name' => 'HP Laptop',
            'price' => '50000',
            'stock' => '10',
            'barcode' => '123456',
        ]);
    }
}