<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\MediaAccess;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;


class Package extends Model implements HasMedia
{
	use HasMediaTrait, MediaAccess;

    protected $fillable = ['name','status'];
}
