<?php

namespace Tests\Unit\Product;

use App\Models\Category;
use App\Models\Product;
use Tests\TestCase;


class ProductTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_it_uses_the_slug_for_the_route_key_name()
    {
        $product = new Product();
        $this->assertEquals($product->getRouteKeyName(), 'slug');
    }

    public function test_it_has_many_categories()
    {
    
        $product = Product::factory()->create();
                
       
        $product->categories()->save(
            Category::factory()->create()
        );

        $this->assertInstanceOf(Category::class, $product->categories()->first());
    }
}
