<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_Category extends Model
{
    protected $fillable = ['cat_id','main_sub_cat_id','name','image'];

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function main_sub_category()
    {
    	return $this->belongsTo('App\Main_Sub_Category');
    }

    public function products()
    {
    	return $this->hasMany('App\Products');
    }
}
