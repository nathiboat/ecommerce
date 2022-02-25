<?php
namespace App\Models\Traits;

use App\Scoping\Scoper;
use Illuminate\Database\Eloquent\Builder;

trait CanBeScroped
{
    public function scopeWithScopes(Builder $builder, $scopes = [])
    {
        
        return (new Scoper(request()))->apply($builder, $scopes);

    }
}