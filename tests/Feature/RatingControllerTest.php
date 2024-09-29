<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class RatingControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_api_product_rating(): void
    {
        $user = Sanctum::actingAs(User::factory()->create());
        $product = Product::factory()->create();
        $data = ['score' => 4];

        $response = $this->actingAs($user)->postJson("api/qualify/product/$product->id", $data);
        $response->assertSuccessful();
        $this->assertDatabaseHas('ratings', [
            'score' => $data['score'],
            'rateable_type' => get_class($product),
            'rateable_id' => $product->id,
            'qualifier_type' => get_class($user),
            'qualifier_id' => $user->id,
        ]);
    }
}
