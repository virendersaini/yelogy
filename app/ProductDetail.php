<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    //
    protected $guarded=['id'];
    public function productcart(){
        return $this->hasOne('App\ProductCart','package_id');
    }
    public function is_wishlist(){
        //return $this->hasOne('App\Wishlist','package_id')->get(['id','package_id']);
        return $this->hasOne('App\Wishlist','package_id')->selectRaw('package_id')->groupBy('package_id');
    }
    public function cart_package(){
        return $this->hasOne('App\ProductCart','package_id');
    }
     public function product()
    {
        return $this->belongsTo('App\Product','product_id');
    }
}
