<?php

namespace App;

use App\Contracts\Alertable;
use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model implements Alertable
{
    protected $guarded = ['id','_token','_method'];

    public function getStatusTextAttribute()
    {
    	return $this->status == 0 ? 'Inactive' : 'Active';
    }

    public function getContent()
    {
    	return 'dummy content';
    }

    public function getTitle()
    {
    	# code...
    }
}
