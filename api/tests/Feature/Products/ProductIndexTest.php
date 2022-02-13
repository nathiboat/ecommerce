<?php

namespace Tests\Feature\Products;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductIndexTest extends TestCase
{
    
    public function test_it_show_the_collection_of_products()
    {
        $products =  Product::factory(2)->create();
       
        $response = $this->json('GET', 'api/products');
        
        $products->each(function ($product) use ($response) {

            $response->assertJsonFragment([
                'slug' => $product->slug
            ]);
        });
    }

    public function test_it_has_paginate_data()
    {
        
       
       $this->json('GET', 'api/products')
       ->assertJsonStructure([
           'data',
           'links',
           'meta'
       ]);
        
        
    }
}
