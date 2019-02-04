<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //
    protected $guarded=['id'];
    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }
}
