<?php
function getStorType(){
	return [
		'grocery'=>'Grocery',
		'vegitable'=>'Vegitable',
		'restaurant'=>'Restaurant',
		'dairyproduct'=>'Dairy Product'
	];
}
function getDeliverTime(){
	return [
		'30 min'=>'30 Min',
		'45 min'=>'45 Min',
		'60 min'=>'60 Min'
	];
}
function bannerType(){
	return[
		//'adds'=>'adds',
		'offer'=>'offer'
	];
}
/**
 * @param  Array $array
 * @return Array
 */
function flip_array(Array $array)
{
	if(empty($array)){
		return [];
	}
	$newArray = [];	
	$arraykeys = array_keys($array);
	$array_length = count($array[array_keys($array)[0]]);
	for($i =0; $i < $array_length; $i++){
		$newArray[] = array_combine(array_keys($array), array_column($array,$i));
	}
	return $newArray;
}

/**
 * @param  date
 * @param  string
 * @param  boolean
 * @return date
 */
function beauty_date($date,$format = '', $time = false)
{
	if(empty($date)){
		return null;
	}
	if(empty($format)){
		if($time === false){
			return date('d-M-Y',strtotime($date));
		}else{
			return date("d-M-Y h:i A",strtotime($date));
		}
	}
	return date($format,strtotime($date));
}

function changeDateFormat($date){
	if(empty($date)){
		return null;
	}
    list($day,$month,$year) = explode('/', $date);
    return \Carbon\Carbon::create($year, $month, $day, 0, 0, 0);
}

/**
 * get app url
 * @param  string
 * @return string
 */
function app_url($url=null)
{
	return !empty($url) ? url($url) : url('/');
}

/**
 * get menu link
 * @param  App\Menu 
 * @return string
 */
function getParamlink($menu)
{
	if(! $menu instanceof \App\MenuItems){
		$menu = \App\MenuItems::find($menu);
	}
	if(is_null($menu)){
		return null;
	}
	$defaultUrl = app_url();
	if($menu->type == "page_link"){
		if(!is_null($menu->page_id)){
			$page = \App\Pages::find($menu->page_id);
			return !is_null($page) ? app_url($page->slug) : $defaultUrl;
		}else{
			return $defaultUrl;
		}
	}
	elseif($menu->type == "internal_link"){
		return !is_null($menu->link) ? app_url($menu->link) : $defaultUrl;
	}
	elseif($menu->type == "external_link"){
		return !is_null($menu->link) ? $menu->link : $defaultUrl;
	}
}


/**
 * get menu active class
* @return string
*/
function get_active_class()
{
	return call_user_func_array(array(request(),"is"),func_get_args()) ? 'active' : '' ;
}

function pr($array)
{
	echo "<figure class='highlight'><pre><code>";
	print_r($array);
	echo "</code></pre></figure>";
}

function pre($array)
{
	echo "<figure class='highlight'><pre><code>";
	print_r($array);
	echo "</code></pre></figure>";
	exit;
}


/**
 * get corbon date
 * @param  string 
 * @return \Carbon\Carbon
 */
function carbon($default=null)
{
	if(!is_null($default)){
		return new \Carbon\Carbon($default);
	}
	return new \Carbon\Carbon;
}

/**
* @return slug to title
*/
function str_title($slug,$seprator = "_")
{
	return title_case(str_replace($seprator," ",$slug));
}

/**
 * get user
 * @param  integer or string
 * @return App\User
 */
function getUser($userId)
{
	if (filter_var($userId, FILTER_VALIDATE_EMAIL) && !is_numeric($userId)) {
		return App\User::whereEmail($userId)->first();
	}
	return App\User::find($userId);
}

/**
 * gunrate a daynmic password
 * @param  integer
 * @return string
 */
function random_password(int $length = 8 ) : string {
	$random_generator="";
    $chars = "abcdefghijklmnopqrstuvwxyzKLMNOPQRSTUVWX";
    $random_generator .=substr( str_shuffle( $chars ), 0, 6 );
    $chars1 = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $random_generator .=substr( str_shuffle( $chars1 ), 0, 2 );
    $chars2 = "0123456789";
    $random_generator .=substr( str_shuffle( $chars2 ), 0, 1 );
    $chars3 = "!@#$%^&*()_;:,.?";
    $random_generator .=substr( str_shuffle( $chars3 ), 0, 1 );

    $new_password = str_shuffle($random_generator);
	return $new_password;
}

/**
 * get controller instance
* @return \App\Http\Controllers\Controller
*/
function container($name)
{
	return app("App\\Http\\Controllers\\".$name);
}

function enable_query_log(){
	return app('DB')::enableQueryLog();
}

function get_query_log(){
	return dd(app('DB')::getQueryLog());
}

function log_queries()
{
	app('DB')::listen(function($query){
        $logFile = storage_path('logs/query.log');
        $monolog = new Monolog\Logger('log');
        $monolog->pushHandler(new Monolog\Handler\StreamHandler($logFile), Monolog\Logger::INFO);
        $monolog->info($query->sql, array('bindings'=>$query->bindings, 'time'=>$query->time));
    });
}

function get_field_list($form_id = null){
	if(!empty($form_id)){
		$fieldslist = \App\FormAttribute::where('form_id',$form_id)->get();
		return $fieldslist;
	}
	return null;
}
/**
 * [get settings]
 * @param  string $key [setting key]
 * @return string      [setting value]
 */

function setting($key)
{

	$settingContainer = container('Admin\\SettingController');
	$localSettings = $settingContainer->getLocalSettings();
	$groupKey = explode('.',$key);
	$setting = null;
	if(empty($localSettings)){
		return null;
	}
	/* Check in Settings in local */
	if(array_key_exists($groupKey[0],$localSettings)){
		$groupSettings = $localSettings[$groupKey[0]];
		$findSetting = array_filter($groupSettings,function ($setting) use($key){
		    return $setting['key'] == $key ? $setting : null;
		});
		if(!empty($findSetting)){
			foreach($findSetting as $_setting);
			$setting = $_setting;
		}
	}
	//dd($setting);
	/* Return if found in local */
	if(!empty($setting)){
		$setting = (object) $setting;
		if($setting->field == 'file'){
			$media = findMedia([
				["model_type", "App\Setting"],
				["model_id", $setting->id ],
				["collection_name", 'settings'],
			]);
			$setting->value = !is_null($media) ? $media->getFullUrl() : null;
		}
		return $setting->value;
	}

	/* Find From database */
	$setting  = app('App\Setting')::findByKey($key);
	if(is_null($setting)){
		return null;
	}
	if($setting->field == 'file'){
		return $setting->getFirstMedia("settings")->getFullUrl();
	}
	return $setting->value;
}

function findMedia($param,$collection = '')
{
	if(is_subclass_of($param,'Spatie\MediaLibrary\HasMedia\HasMedia')){
		return $param->getFirstMedia($collection);
	}
	$model = config('medialibrary.media_model');
	$mediaModel = new $model;
	$media = null;
	if(is_array($param)){
		$media = $mediaModel->where($param)->first();
	}
	return $media;
}

function get_listing($listingType)
{
    $listingConfig = config("listing");
    $listingType = strtolower($listingType);    
    if(array_key_exists($listingType,$listingConfig)){
        $modelConfig = $listingConfig[$listingType];
        $modelInstance = with($modelConfig["model"]::where($modelConfig["conditions"]));
        $modelInstance->addSelect($modelConfig["fields"]);
        if(array_key_exists('with',$modelConfig)){
            $modelInstance->with($modelConfig["with"]);
        }
        if(array_key_exists("conditions_raw",$modelConfig)){
        	foreach ($modelConfig["conditions_raw"] as $rawCondition){
        		$modelInstance->whereRaw($rawCondition);
        	}
        }
        if(array_key_exists('joins',$modelConfig) && !empty($modelConfig["joins"])){
        	$joins = $modelConfig["joins"];
            foreach ($joins as $join) {
            	$modelInstance->join($join['table'], function ($join) {
		            $join->on($join['on'][0],$join['on'][1],$join['on'][2]);
		            if(array_has($join,'where')){
		                $join->where($join['where'][0],$join['where'][1],$join['where'][2]);
		            }
		        });
            }
        }
        if(array_key_exists('order_by',$modelConfig)){
        	$orderBy = $modelConfig['order_by'];
        	$modelInstance->orderBy($orderBy[0], $orderBy[1]);     
        }
        return $modelInstance->get();
    }
    return collect();
}

function isDBCollection($var){
    if($var instanceof Illuminate\Database\Eloquent\Collection){
        return true;
    }
    return false;
}

function generate_id($number,$prefix = null,$length = 4)
{
	$prefix = !is_null($prefix) ? $prefix . '-'  :  null;
	return $prefix . str_pad($number + 1, $length, 0, STR_PAD_LEFT);
}

function checkofferexist($userid,$inventoryid){
	if(!empty($userid) && !empty($inventoryid)){
		if(app('App\InventoryOffer')::where('user_id',$userid)->where('inventory_id',$inventoryid)->get()->count()){
			return false;
		}
	}
	return true;
}

function auth_id($guard=null)
{
	$guard = $guard == "member" ? "web" : $guard;
	return app('Auth')::guard($guard)->id();
}

function guard($name=null)
{
	return app('Auth')::guard($name);
}

function admin()
{
	return app('Auth')::guard('admin')->user();
}

function member()
{
	return app('Auth')::guard('web')->user();
}

function inventory_count($inventory_type = null){
	return app('App\VehiclesInventory')::where('status','active')->where('inventoryType',$inventory_type)->get()->count();
}

function websitefeeds($type){
	return app('App\WebsiteFeeds')::where('type',$type)->where('status','active')->get();
}
/**
 * /
 * @return [App\Services\Form\Builder\Html] [Html Builder Instance]
 */
function html()
{
	return new \App\Services\Form\Builder\Html;
}

function header_menu($groupname = 'Header')
{
	return \App\MenuItems::whereHas("group" , function($query) use($groupname){
		return $query->whereName($groupname);
	})->withoutParent()->get()->sortBy('lft');
}

function get_the_title($slug = ''){
	$title =  \App\Pages::where('slug',$slug)->first(['title']);
	if(!empty($title)){
		return $title->title;
	}
	return 'Welcome';
}
function get_the_content($slug = ''){
	$content = \App\Pages::where('slug',$slug)->first(['content']);
	if(!empty($content)){
		return $content->content;
	}
	return 'This is just Welcome Content.';
}

if (! function_exists('words')) { 
	function words($value, $words, $end = '...'){
    	return \Illuminate\Support\Str::words(strip_tags($value), $words, $end);	
	}
}


function is_multi_array(Array $a) {
    foreach ($a as $v) {
        if (is_array($v)) return true;
    }
    return false;
}


function fetchData($entityId, $entityType)
{
    $formData = \App\FormData::where("entity_type",$entityType);
    if(is_array($entityId)){
    	$formData->whereIn('entity_id',$entityId);
    }else{
    	$formData->where('entity_id',$entityId);
    }
   	//$formData->whereNull("parent_attribute_id");
    $formData->with('attribute');
    return $formData;
}

function getForm($formSlug = null){
	if(!empty($formSlug)){
		$formId = \App\Form::where('name',$formSlug)->first(['id']);
		return $formId->id;
	}
	return false;
}


function getData($formid,$attributeId = null,$entityid = null){
	//To Get the single Attribute Value
	if(!empty($formid) && !empty($attributeId) && !empty($entityid)){
		if(is_numeric($attributeId)){
			$attId = $attributeId;
		}else{
			$attObject = \App\FormAttribute::where('name',$attributeId)->first(['id']);
			$attId = $attObject->id;
		}
		$attrValue = \App\FormData::where([['attribute_id',$attId],['form_id',$formid],['entity_id',$entityid]])->first();
		
		return !empty($attrValue->attribute_value) ? $attrValue->attribute_value : '' ;
	}
	return false;
}


function getCompleteData($formid,$entityid = null,$entitytype = null){	
	if(!empty($formid) && !empty($entityid)){			
		$formAttr = \App\FormAttribute::where('form_id',$formid)->select('id as attId','form_id','title','name','type','attribute_type','parent_id','listing')->get()->keyBy('attId')->toArray();	
		$formData = \App\FormData::where('form_data.form_id',$formid)->where('entity_id',$entityid)->where('entity_type','=',$entitytype);	
		$formDataGet = $formData->get()->keyBy('id')->toArray();
		$dataLayout = array();			
		foreach ($formDataGet as $key => $value) {			
			if(!empty($value['attribute_id']) && !empty($value['parent_attribute_id'])){
				if(!isset($dataLayout[$value['parent_attribute_id']])){
					$dataLayout[$value['parent_attribute_id']] = $formAttr[$value['parent_attribute_id']];
				}
				$dataLayout[$value['parent_attribute_id']]['repeter'][] = array_merge($formAttr[$value['attribute_id']],$value);	

				//To Add listing Value
				$lastKey = count($dataLayout[$value['parent_attribute_id']]['repeter'])-1;	
				if(!empty($dataLayout[$value['parent_attribute_id']]['repeter'][$lastKey]['listing'])){	
					$selected = getSelected($dataLayout[$value['parent_attribute_id']]['repeter'][$lastKey]['listing'],$dataLayout[$value['parent_attribute_id']]['repeter'][$lastKey]['attribute_value']);
					$dataLayout[$value['parent_attribute_id']]['repeter'][$lastKey]['attribute_value'] = $selected;
				}

			}else if(!empty($value['attribute_id']) && empty($value['parent_attribute_id'])){
				$dataLayout[$value['attribute_id']] = array_merge($formAttr[$value['attribute_id']],$value);
				if(!empty($dataLayout[$value['attribute_id']]['listing'])){					
					$selected = getSelected($dataLayout[$value['attribute_id']]['listing'],$dataLayout[$value['attribute_id']]['attribute_value']);
					$dataLayout[$value['attribute_id']]['attribute_value'] = $selected;
				}
			}
		}
		return collect($dataLayout);	
	}	
}
function getRepeatorData($formid,$ParentattributId=null,$entitytype,$entityid){

	if(!empty($formid) && !empty($ParentattributId)){
		$formdata = \App\FormData::where([['form_id',$formid],['parent_attribute_id',$ParentattributId],['entity_type',$entitytype],['entity_id',$entityid]])->get();
		return $formdata;
	}
	return false;
}

function getPrimaryMember($companyid){
	$user = \App\User::where([['company_id',$companyid],['primary_contact','1']])->first();
	if($user){
		return $user;
	}
	return false;
}

function getBillingMember($companyid){
	$user = \App\User::where([['company_id',$companyid],['billing_contact','1']])->first();
	if($user){
		return $user;
	}
	return false;
}
function getCountry($countryId){
	$country = \App\Country::where('id',$countryId)->first();
	if($country){
		return $country;
	}
	return false;
}

function getSupplyMarket($supplymarketId){
	$supplymarket = \App\SupplyMarget::where('id',$supplymarketId)->first();
	if($supplymarket){
		return $supplymarket->title;
	}
	return false;
}
function getMakes($makesid){
	$SpecializedIn = \App\SpecializedIn::where('id',$makesid)->first();
	if($SpecializedIn){
		return $SpecializedIn->title;
	}
	return false;
}
function getTargetmarkets($targetmakesid){
	$TargetMarget = \App\TargetMarget::where('id',$targetmakesid)->first();
	if($TargetMarget){
		return $TargetMarget->title;
	}
	return false;
}
function getSelected($listingType,$selectedValue){	
	if(!empty($listingType) && !empty($selectedValue)){
		$listingConfig = config("listing.".$listingType);	
		return $listingConfig['model']::where('id',$selectedValue)->get($listingConfig['fields'])->toArray();	
	}
	return null;

}

if (! function_exists('words')) {
    /**
     * Limit the number of words in a string.
     *
     * @param  string  $value
     * @param  int     $words
     * @param  string  $end
     * @return string
     */
    function words($value, $words = 100, $end = '...')
    {
        return \Illuminate\Support\Str::words($value, $words, $end);
    }
}
function getMembers($id = null){
	$users = \App\User::where('company_id',$id)->pluck('id')->toArray();	
	$formData = \App\FormData::whereIn('entity_id',$users)->where('entity_type','=','App\User')->get()->keyBy('id')->toArray();
	$formAttr = \App\FormAttribute::where('form_id',1)->select('id as attId','form_id','title','name','type','attribute_type','parent_id','listing')->get()->keyBy('attId')->toArray();	
	$newData = array();
	if(!empty($formData)){
		foreach ($formData as $key => $value) {
			$newData[$value['entity_id']][] = array_merge($value,$formAttr[$value['attribute_id']]);
		}
	}
	return collect($newData);
}

function public_storage_url($filepath = null)
{
	return Storage::disk('public')->url($filepath);
}


function usertitle(){
	return  array("mr" => "Mr", "mrs" => "Mrs", "ms" => "Ms",'miss'=>'Miss' );
}
function category(){
	return  array("Domestic" => "Domestic", "Commercial" => "Commercial", "Both" => "Both", );
}
function houseTagsType(){
	return  array("" => "Select Tag Type", "Bedroom" => "Bedroom", "Bathroom" => "Bathroom", "Kitchen" => "Kitchen", "Living room / Reception" => "Living room / Reception", "Utility room" => "Utility room", "Study" => "Study", "Hallway" => "Hallway", "Stairs" => "Stairs");
}

function officeTagsType(){
	return  array("" => "Select Tag Type", "Main Office" => "Main Office", "Other Offices" => "Other Offices", "Meeting Rooms" => "Meeting Rooms", "Board Room" => "Board Room", "Reception" => "Reception", "Showers" => "Showers", "Toilets" => "Toilets", "Kitchen" => "Kitchen", "Staff Room" => "Staff Room", "Hallway &amp; Stairs" => "Hallway &amp; Stairs","Store Room"=>"Store Room");
}
function numberType(){
	return array('' => 'Select', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10);
}

function str_encrypt($value)
{
    return bin2hex(serialize($value));
}

function str_decrypt($value)
{
    try {
        return unserialize(hex2bin($value));
    } catch (Exception $e) {
        if (app()->environment() == 'local' || app()->environment() == 'testing') {
            return $e->getMessage();
        }
        return ("unable to convert value");
    }

}
function actions_view($row)
{
	return view('components.datatable_actions', array(
        'actions' =>  $this->actions($row)
    ));
}