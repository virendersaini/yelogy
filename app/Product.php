<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //protected $fillable = ['name', 'producttype_id','category_id','image'];
	protected $guarded = ['id'];
 	public function brand()
    {
        return $this->belongsTo('App\Brand','brand_id');
    }
    public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    }
    public function subcategory()
    {
        return $this->belongsTo('App\Category','subcategory_id');
    }
    public function package(){
        return $this->hasMany('App\ProductDetail','product_id');
    }
    public function wishlist(){
        return $this->hasOne('App\Wishlist','package_id');
    }
}
