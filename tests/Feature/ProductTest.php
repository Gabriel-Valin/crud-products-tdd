<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_all_products() {
        Product::factory(10)->create();
        $response = $this->get('/api/products/getProducts');

        $response->assertJsonCount(10);
        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_get_unique_product() {
        $product = Product::factory()->create();
        $response = $this->get('/api/products/getOneProduct/'.$product->id);

        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonStructure(['id']);
    }
}
