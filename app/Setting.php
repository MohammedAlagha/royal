<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key','value'];


    public static function getValue($key)
    {
        if (Setting::where('key',$key)->first()) {
            return Setting::where('key', $key)->first()->value;
        }else{
            return null;
        }
    }

    public static function setValue($key,$value)
    {
        Setting::where('key',$key)->first()->update(['value'=> $value]);
    }

}
