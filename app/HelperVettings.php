<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HelperVettings extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = ['helper_id','UTR_number','NI_number','right_to_work','visa','visa_date','crb','insurance','policy_no','policy_expiry_date','UK_reference_name1','UK_reference_name2','phone_ref1','phone_ref2','email_ref1','email_ref2','ref1_contacted','ref2_contacted'];
}
