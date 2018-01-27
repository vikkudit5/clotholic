<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Main_Sub_Category extends Model
{
    protected $fillable = ['cat_id','name','image'];

    public function category()
    {
    	return $this->belongsTo('App\category');
    }

    public function sub_category()
    {
    	return $this->hasMany('App\Sub_Category');
    }

    public function products()
    {
    	return $this->hasMany('App\Products');
    }
}
