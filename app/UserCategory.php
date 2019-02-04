<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCategory extends Model
{
     public function category()
    {
        return $this->belongsTo('App\Category', 'subcategory_id');
    }
}
