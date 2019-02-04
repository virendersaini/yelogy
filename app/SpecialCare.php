<?php

namespace App;

use File;
use App\Traits\MediaAccess;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
class SpecialCare extends Model implements HasMedia
{
    use HasMediaTrait, MediaAccess;
    protected $fillable = ['house_map_id','item_name','item_location'];
    protected function updatecreate($request,$id = null){

    	if (empty($id)) {
            if(!empty($request->special_care)){
        		foreach ($request->special_care as $key => $value) {
                    $specialCare = new SpecialCare;
        			$specialCare->house_map_id = $request->house_map_id;
        			$specialCare->item_name = $request->item_name[$key];
        			$specialCare->item_location = $request->item_location[$key];
        			$specialCare->save();
                        $mediaItems = $specialCare->getFirstMedia('special_care');
                        optional($mediaItems)->delete() ;              
                        $bannerimage = $specialCare->addMedia($value)->toMediaCollection('special_care');
        		}
                return $specialCare; 
            }
    	}else{
            if(!empty($request->special_care)){
                foreach ($request->special_care as $key => $value) {
                    $specialCare = SpecialCare::find($id);
                    $specialCare->house_map_id = $request->house_map_id;
                    $specialCare->item_name = $request->item_name[$key];
                    $specialCare->item_location = $request->item_location[$key];
                    $specialCare->save();
                        $mediaItems = $specialCare->getFirstMedia('special_care');
                        optional($mediaItems)->delete() ;              
                        $bannerimage = $specialCare->addMedia($value)->toMediaCollection('special_care');
                }
                return $specialCare; 
            }
    	}
    }
}
