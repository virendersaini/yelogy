<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagtypeManager extends Model
{
    protected $fillable = [
        'name', 'map_type', 'type'
    ];
    public function tagManager(){
        return $this->hasMany('App\TagManager', 'tagtype_manager_id', 'id');
    }
}
