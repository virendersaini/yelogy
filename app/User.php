<?php

namespace App;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Passport\HasApiTokens;
use App\Traits\MediaAccess;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable implements HasMedia
{
    use Notifiable, HasRoles,HasApiTokens, HasMediaTrait, MediaAccess,SoftDeletes;

    protected $guard_name = 'admin';
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /*protected $fillable = ['name', 'email', 'password','first_name', 'last_name', 'mobile','pincode','image','store_type','delivery_time'];*/
    protected $guarded=['id'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function rating(){
       return $this->hasMany('App\Review','store_id')->selectRaw('TRUNCATE(avg(rating),1) as avg_rating,store_id')->groupBy('store_id');
       
    }  
    public function favourite(){
        return $this->hasOne('App\Wishlist','store_id');
    }
     public function reviews(){
        return $this->hasMany('App\Review','store_id');
    }
    public function cart(){
        return $this->hasMany('App\ProductCart','customer_id');
    }
}
