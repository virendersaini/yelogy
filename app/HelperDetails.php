<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class HelperDetails extends Model
{	
	use SoftDeletes;
    protected $dates = ['deleted_at'];

    
    protected $fillable = ['uid','type','nickname','dob','alternate_number','address','address1','area','county','invoice_postcode','status','nationality','marketing','interview_date','cleaning_rating','english_level','other_language','start_date','end_date','days_available','area_preference'];
    
}
