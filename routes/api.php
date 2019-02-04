<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/signup','Api\RegisterController@signup');
Route::post('/login','Api\RegisterController@login');
Route::post('/near_by_store','Api\RegisterController@getStore');
Route::post('/cat_subcat','Api\RegisterController@getStoreCategories');
Route::post('/product_list','Api\RegisterController@getProducts');
Route::post('/brand_list','Api\RegisterController@brand_list');
Route::post('/add_to_cart','Api\RegisterController@addToCart');
Route::post('/add_delivery_address','Api\RegisterController@add_delivery_address');
Route::post('/delivery_address_list','Api\RegisterController@delivery_address_list');
Route::post('/remove_to_cart','Api\RegisterController@removeToCart');
Route::post('/remove_all_to_cart','Api\RegisterController@removeAllToCart');
Route::post('/cart_list','Api\RegisterController@cartList');
Route::post('/wishlist','Api\RegisterController@wishlistItems');
Route::post('/my_profile','Api\RegisterController@myProfile');
Route::post('/product_detail','Api\RegisterController@productDetail');
Route::post('/update_profile','Api\RegisterController@updateProfile');
Route::post('/banners','Api\RegisterController@banners');
Route::post('/checkout','Api\RegisterController@checkout');
Route::post('/myorders','Api\RegisterController@myorders');
Route::post('/orderdetail','Api\RegisterController@orderdetail');
Route::post('/itemsInOrder','Api\RegisterController@itemsInOrder');
Route::post('/cancelOrder','Api\RegisterController@cancelOrder');
Route::post('/walletAndReferal','Api\RegisterController@walletAndReferal');
Route::post('/wishlist_favourite/add_remove','Api\RegisterController@addRemoveWishlist');
