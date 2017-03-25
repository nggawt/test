<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function shopes(){

    	return $this->belongsTo('App\Shope');
    }
}
