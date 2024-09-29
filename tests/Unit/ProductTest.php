<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     */
    public function test_a_product_belongs_to_category(): void
    {
        $category = Category::factory()->create();
        $createdBy = User::factory()->create();
//        $category->dump();
        $product = Product::factory()->create(['category_id' => $category->id, 'created_by' => $createdBy->id]);
        $this->assertInstanceOf(Category::class, $product->category);
    }

    public function test_a_product_belongs_to_user(): void
    {
        $category = Category::factory()->create();
        $createdBy = User::factory()->create();
//        $category->dump();
        $product = Product::factory()->create(['category_id' => $category->id, 'created_by' => $createdBy->id]);
        $this->assertInstanceOf(User::class, $product->createdBy);
    }
}
