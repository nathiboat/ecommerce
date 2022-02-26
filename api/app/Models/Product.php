<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Traits\CanBeScroped;
use App\Models\Traits\HasPrice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, CanBeScroped, HasPrice;

    public function getRouteKeyName()
    {
        return 'slug';
    }

   
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function variations()
    {
        return $this->hasMany(ProductVariation::class)->orderBy('order', 'asc');
    }
}
