<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductsTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testReturnsProductsInJsonFormat()
    {
        factory(Product::class, 4)->create();
        $product1 = Product::findOrFail(1);
        $product2 = Product::findOrFail(2);

        $response = $this->json('GET', 'api/products');
        $response
            ->assertStatus(200)
            ->assertJson([
                [
                'name'      => $product1->name,
                'sku'       => $product1->sku,
                'quantity'  => $product1->quantity,
                'price'     => $product1->price
                ],
                [
                'name'      => $product2->name,
                'sku'       => $product2->sku,
                'quantity'  => $product2->quantity,
                'price'     => $product2->price
                ]
            ]);
    }

    public function testReturnsProductInJsonFormat()
    {
        factory(Product::class)->create();
        $product = Product::findOrFail(1);

        $response = $this->json('GET', 'api/products/1');
        $response
            ->assertStatus(200)
            ->assertJson([
                'name'      => $product->name,
                'sku'       => $product->sku,
                'quantity'  => $product->quantity,
                'price'     => $product->price
            ]);
    }
}