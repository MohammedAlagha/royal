<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    public $fillable = ['name','status'];

    public function products()
    {
        return $this->hasMany(Product::class,'category_id','id');
    }
}
