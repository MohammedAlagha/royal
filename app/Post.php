<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable =
        ['title','details','thumbnail','image'];



    public function getMonthAttribute($value)
    {
        return $this->created_at->format('M');
    }

    public function getDayAttribute()
    {
        return $this->created_at->format('d');

    }
}
