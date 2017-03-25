<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shope extends Model
{
	protected  $fillable =['shope_name','branches','branches_id'];

    public function products(){

    	return $this->hasMany('App\Product');
    }
}
