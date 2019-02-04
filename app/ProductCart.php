<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCart extends Model
{
    //
   protected $guarded = ['id'];
   public function package(){
        return $this->belongsTo('App\ProductDetail','package_id');
    }
    public function product(){
        return $this->belongsTo('App\Product','product_id');
    }
}
