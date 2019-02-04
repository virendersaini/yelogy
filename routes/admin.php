<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::adminAuthRoutes();

Route::shouldAuthenticate(function ($router) {

	Route::get('add-more/{id}/{addmore}', 'ProductController@addMore')->name('add-more');
	Route::get('tag_manage/{id}/{type}', 'CustomerController@tag_manage')->name('tag_manage');
	Route::get('addTag/{type}/{tag}', 'CustomerController@addTag')->name('addTag');
	Route::get('banners', 'CustomerController@banners')->name('banners');
	Route::get('banner_create', 'CustomerController@bannerCreate')->name('banner_create');
	Route::get('banner_edit/{id}', 'CustomerController@bannerEdit')->name('banner_edit');
	Route::post('bannerstore', 'CustomerController@bannerstore')->name('bannerstore');
	Route::put('bannerupdate/{id}', 'CustomerController@bannerupdate')->name('bannerupdate');
	Route::delete('banner_destroy/{id}', 'CustomerController@banner_destroy')->name('banner_destroy');

	Route::get('productListByProductType/{id}', 'CustomerController@productListByProductType')->name('productListByProductType');

	Route::get('/', function () {

	    return view('admin.welcome');
	});




	Route::get('user_list', 'JustHelperController@userList')->name('user_list');

	Route::post('change-status', 'JustHelperController@changeStatus')->name('change-status');


	/****** Just Helper ******/

	Route::resource('just-helper', 'JustHelperController');

	/****** Staff Mananger ******/

	Route::resource('staff','StaffController');

	/****** Customer Mananger ******/

	Route::resource('customer', 'CustomerController');



	/*
	** ALL Tags Manager 
	*/
	
	/****** Tag Manager ******/
	Route::get('tag_list', 'TagManagerController@tagList')->name('tag_list');
	Route::get('tag-manager/tag-listing', 'TagManagerController@tagListing')->name('tag-listing');
	Route::resource('tag-manager', 'TagManagerController');

	/****** Marketing Manager ******/
	Route::resource('marketing', 'MarketController');
	Route::get('market_list', 'MarketController@marketList')->name('market_list');

	/****** Discs Manager ******/
	Route::resource('discs', 'DiscsController');
	Route::get('disc_list', 'DiscsController@discList')->name('disc_list');

	/****** Allergy Manager ******/
	Route::resource('allergies','AllergyController');
	Route::get('allergy_list', 'AllergyController@allergyList')->name('allergy_list');

	/****** Products ******/
	Route::resource('product', 'ProductController');
	Route::get('product_list', 'ProductController@productList')->name('product_list');
	Route::post('product/update/{id}', 'ProductController@update');
	Route::get('product/subcategory/{id}', 'ProductController@subcategory');

	/****** categories ******/
	Route::resource('category', 'CategoryController');
	Route::get('category_list', 'CategoryController@categoryList')->name('category_list');
	Route::post('category/update/{id}', 'CategoryController@update');

	/****** Product Type ******/
	Route::resource('producttype', 'ProductTypeController');
	Route::get('producttype_list', 'ProductTypeController@producttypeList')->name('producttype_list');


	Route::resource('packages','PackagesController');


});

/* Email Manager */
Route::get('alerts/fetch-templates/{templateType}', 'AlertController@fetchTemplates')->name('fetch-templates');
Route::resource('alerts', 'AlertController');
Route::resource('email-templates', 'EmailTemplateController');

/****** Helper Quality ******/
Route::resource('helperquality', 'HelperQualityController');
Route::get('helperquality_list', 'HelperQualityController@helperqualityList')->name('helperquality_list');



Route::group(['middleware'=>'checkrole:customer'], function () {
	Route::get('/customeradmin/dashboard', 'CustomerController@dashboard');
});

Route::group(['middleware'=>'checkrole:helper'], function () {
	Route::get('/helperadmin/dashboard','JustHelperController@dashboard');
});


