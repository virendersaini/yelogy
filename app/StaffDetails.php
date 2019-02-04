<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StaffDetails extends Model
{
	use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['uid','address','address2','county','postcode','mobile','dob','age','next_of_kin','relation_next_of_kin','uk_driving_licence','own_car','nationality','national_insurance_number','proof_of_address','proof_of_photoid','allergy','joining_date','disc','bankName','accountHolderName','accountNumber','sortCode'];

}
