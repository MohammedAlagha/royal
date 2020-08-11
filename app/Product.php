<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable =
        ['name', 'description', 'price', 'image', 'category_id'];


    protected $appends = ['details_route'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    //scopes................................................................
    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('name', 'like', "%$search%");
        });
    }



    public function scopeWhenCategory($query, $category)
    {
        return $query->when($category, function ($q) use ($category) {
            return $q->whereHas($category, function ($qe) use ($category) {
                return $qe->whereIn('category_id', (array)$category)
                    ->orWhereIn('name', (array)$category);
            });
        });
    }

    public function getDetailsRouteAttribute()
    {
        return route('products.single_product',$this->id);
    }
}
