<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function shope(){

    	return $this->belongsTo('App\Shope','shope_id');
    }
}
