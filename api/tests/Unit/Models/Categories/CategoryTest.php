<?php

namespace Tests\Unit\Models\Categories;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Category;
use App\Models\Product;
use Tests\TestCase;



class CategoryTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_it_many_children()
    {
        $category = Category::factory()->create();

        $category->children()->save(
            Category::factory()->create()
        );

        $this->assertInstanceOf(Category::class, $category->children->first());

    }

    public function test_it_can_fetch_only_parents()
    {
        $category = Category::factory()->create();

        $category->children()->save(
            Category::factory()->create()
        );

        $this->assertEquals(1, $category::parents()->count());

    }

    public function test_it_is_orderable_by_a_numbered_order()
    {
        $category = Category::factory()->create([
            'order' => 2   
        ]);

        $anotherCategory = Category::factory()->create([
            'order' => 1   
        ]);

        $this->assertEquals($anotherCategory->name, $category::ordered()->first()->name);

    }

    public function test_it_has_many_product()
    {
        $category = Category::factory()->create();


        $category->products()->save(
            Product::factory()->create()
        );

        $this->assertInstanceOf(Product::class, $category->products->first());
    }
}
