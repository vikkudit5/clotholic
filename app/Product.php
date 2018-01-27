<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function main_sub_category()
    {
    	return $this->belongsTo('App\Main_Sub_Category');
    }

    public function sub_category()
    {
    	return $this->belongsTo('App\Sub_Category');
    }

    public function images()
    {
    	return $this->hasMany('App\Image');
    }
}
