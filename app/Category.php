<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','image'];

    protected $hidden = [
        'remember_token',
    ];


    public function main_sub_category()
	{
		return $this->hasMany('App\Main_Sub_Category');
	}

	public function sub_category()
	{
		return $this->hasMany('App\Sub_Category');
	}

	public function products()
	{
		return $this->hasMany('App\products');
	}
}

