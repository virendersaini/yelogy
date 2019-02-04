<?php

namespace App;
use File;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
class Customer extends Model implements HasMedia
{
	use HasMediaTrait;
   /* protected $fillable = ['customer_type','user_id','county','invoice_postcode','area','disc','marketing','referral','key_holder','alarm','pet_type','pet_name','flatmate','children','allergies','the_why','type_of_visit','first_date_of_appointment','time_of_appointment','start_date','last_date','management_check_date','last_management_check_score','next_management_check_date','marketing_lead','address_1','address_2','status'];*/
    protected $guarded = ['id'];

    protected function updatecreate($request,$id = null){
    	if(empty($id)){
	    	$customer = new Customer;
	    	$customer->user_id = $request->user_id;
	    	$customer->customer_type = $request->customer_type;

	    	$customer->cust_title = $request->cust_title;
	    	$customer->cust_first_name = $request->cust_first_name;
	    	$customer->cust_last_name = $request->cust_last_name;
	    	$customer->cust_phone_number = $request->cust_phone_number;
	    	$customer->cust_email = $request->cust_email;


	    	$customer->helper_name =$request->helper_name;
	    	$customer->package_id =$request->package_id;
	    	$customer->time_taken =$request->time_taken;
	    	$customer->cleaning_days =$request->cleaning_days;
	    	$customer->frequency =$request->frequency;
	    	$customer->start_time =$request->start_time;
	    	$customer->agreed_cost_per_hour =$request->agreed_cost_per_hour;



	    	$customer->sales_visit_manager = $request->sales_visit_manager;
	    	$customer->sales_visit_date = $request->sales_visit_date;
	    	$customer->time_of_appointment = $request->time_of_appointment;
	    	$customer->last_management_checked_by = $request->last_management_checked_by;
	    	$customer->start_date = $request->start_date;
	    	$customer->last_date = $request->last_date;
	    	$customer->management_check_date = $request->management_check_date;
	    	$customer->last_management_check_score = $request->last_management_check_score;
	    	$customer->next_management_check_date = $request->next_management_check_date;

	    	
	    	$customer->county = $request->county;
	    	$customer->county = $request->area;
	    	
	    	
	    	$customer->invoice_postcode = $request->invoice_postcode;
	    	$customer->disc_id = json_encode($request->disc_id);
	    	$customer->allergy_id=json_encode($request->allergy_id);

	    	$customer->market_id = $request->market_id;
	    	$customer->referral = $request->referral;
	    	$customer->key_holder = $request->key_holder;
	    	$customer->alarm = $request->alarm;
	    	$customer->pet_type = $request->pet_type;
	    	$customer->pet_name = $request->pet_name;
	    	$customer->flatmate = $request->flatmate;
	    	
	    	$customer->address_1 = $request->address_1;
	    	$customer->address_2 = $request->address_2;

	    	$customer->product_type = $request->product_type;
	    	$customer->product_list = json_encode($request->product_list);
	    	$customer->status = $request->status ?? '';

	    	$customer->save();
	    }else{
	    	$customer = Customer::find($id);
	    	$customer->user_id = $request->user_id;
	    	$customer->customer_type = $request->customer_type;

	    	$customer->cust_title = $request->cust_title;
	    	$customer->cust_first_name = $request->cust_first_name;
	    	$customer->cust_last_name = $request->cust_last_name;
	    	$customer->cust_phone_number = $request->cust_phone_number;
	    	$customer->cust_email = $request->cust_email;


	    	$customer->helper_name =$request->helper_name;
	    	$customer->package_id =$request->package_id;
	    	$customer->time_taken =$request->time_taken;
	    	$customer->cleaning_days =$request->cleaning_days;
	    	$customer->frequency =$request->frequency;
	    	$customer->start_time =$request->start_time;
	    	$customer->agreed_cost_per_hour =$request->agreed_cost_per_hour;



	    	$customer->sales_visit_manager = $request->sales_visit_manager;
	    	$customer->sales_visit_date = $request->sales_visit_date;
	    	$customer->time_of_appointment = $request->time_of_appointment;
	    	$customer->last_management_checked_by = $request->last_management_checked_by;
	    	$customer->start_date = $request->start_date;
	    	$customer->last_date = $request->last_date;
	    	$customer->management_check_date = $request->management_check_date;
	    	$customer->last_management_check_score = $request->last_management_check_score;
	    	$customer->next_management_check_date = $request->next_management_check_date;

	    	
	    	$customer->county = $request->county;
	    	$customer->county = $request->area;
	    	
	    	
	    	$customer->invoice_postcode = $request->invoice_postcode;
	    	$customer->disc_id = json_encode($request->disc_id);
	    	$customer->allergy_id=json_encode($request->allergy_id);

	    	$customer->market_id = $request->market_id;
	    	$customer->referral = $request->referral;
	    	$customer->key_holder = $request->key_holder;
	    	$customer->alarm = $request->alarm;
	    	$customer->pet_type = $request->pet_type;
	    	$customer->pet_name = $request->pet_name;
	    	$customer->flatmate = $request->flatmate;
	    	
	    	$customer->address_1 = $request->address_1;
	    	$customer->address_2 = $request->address_2;

	    	$customer->product_type = $request->product_type;
	    	$customer->product_list = json_encode($request->product_list);
	    	$customer->status = $request->status ?? '';
	    	$customer->save();
	    }
	    if($customer){
			if($request->hasFile('contract_1')){
	        	$mediaItems = $customer->getFirstMedia('contract_1');
	        	optional($mediaItems)->delete() ;              
	            $bannerimage = $customer->addMedia($request->file('contract_1'))->toMediaCollection('contract_1');
	        }
	        if($request->hasFile('contract_2')){
	            $mediaItems1 = $customer->getFirstMedia('contract_2');
	        	optional($mediaItems1)->delete() ;              
	            $bannerimage1 = $customer->addMedia($request->file('contract_2'))->toMediaCollection('contract_2');
	        }
	    }
    	return $customer;
    }

    
}
