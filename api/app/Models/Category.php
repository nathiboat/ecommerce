<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasChildren;
use App\Models\Traits\IsOrderable;


class Category extends Model
{
    use HasFactory, HasChildren, IsOrderable;

    protected $fillable = [
        'name',
        'slug',
        'order'
    ];

    
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
}
