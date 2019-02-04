<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CreateUpdates;

class HouseMap extends Model
{
	use CreateUpdates;

    /*protected $fillable = ['user_id','area','number_of_bedroom','bedroom_tag','number_of_bathroom','bathroom_tag','number_of_reception','reception_tag','number_of_kitchen','kitchen_tag','number_of_study','study_tag','number_of_hallway_stairs','hallway_stairs','number_of_utility','utility_stairs','other','mop_bucket','location_of_mop_bucket','cleaning_product','location_of_cleaning_product','additional_task_1','additional_task_2','priority_areas','platinum_diamond_service','other_information'];*/
    protected $guarded = ['id'];

    public function special_care(){
        return $this->hasMany('App\SpecialCare', 'house_map_id', 'id');
    }

    protected function updatecreate($request,$id = null){
    	if (empty($id)) {
    		return HouseMap::create($request->only('user_id','bedroom_tag','bathroom_tag','reception_tag','kitchen_tag','study_tag','stairs_tag','hallway_tag','utility_tag','other','location_of_mop_bucket','location_of_cleaning_product','location_of_vacuum_cleaner','location_of_consumables','additional','additional_task_1','additional_task_2','additional_task_3','priority_areas','platinum_diamond_service','other_information'));
    	}else{
    		$houseMap = HouseMap::find($id);
    		return $houseMap->update($request->all());
    	}
    }
}
