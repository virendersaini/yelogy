<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagManager extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tag_name', 'tag_type', 'tagtype_manager_id',
    ];
}
