<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testReturnsProductsInJsonFormat()
    {
        factory(Product::class, 4)->create();
        $product = Product::findOrFail(1);

        $response = $this->json('GET', 'api/products');
        $response
            ->assertStatus(200)
            ->assertJson([[
                'name'      => $product->name,
                'sku'       => $product->sku,
                'quantity'  => $product->quantity,
                'price'     => $product->price
            ]]);
    }
}