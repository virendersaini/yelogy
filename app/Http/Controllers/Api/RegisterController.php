<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\UserCategory;
use App\Category;
use App\Product;
use App\Wishlist;
use App\ProductCart;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Routing\UrlGenerator;
use App\Banner;
use App\Address;
use App\Brand;
use App\Order;
use App\OrderDetail;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/register';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UrlGenerator $url)
    {
      $this->url = $url;
        $this->middleware('guest');
    }

    protected function signup(Request $request)
    {
      //return response()->json($request->toArray());
      $rules =  [
          'first_name' => 'required',
          //'last_name' => 'required',               
          'email' => 'nullable|string|email',
          'mobile' =>'required|numeric|unique:users',
          'pincode'=>'required|numeric',
          'password' => 'required|string|min:6|',
          //'password_confirmed' => 'required|string|min:6',
          
      ];
      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails()) {  
        $validateError = $validator->errors()->toArray();
          $firstkey = array_keys($validateError)[0];
          $error = $validateError[$firstkey][0];
        return response()->json(['status' => false,'message'=>$error,'data'=>null]);
      }     
      $userdata = [
          'first_name' => $request->first_name,
          'last_name' => $request->last_name,            
          'mobile' => $request->mobile ?? null,  
          'email' => $request->email  ?? null,
          'pincode'=>$request->pincode ?? null,
          'password' => Hash::make($request->password),
          'name'=>$request->first_name.' '.$request->last_name,
          'status' => 'active',
          'refferal_code'=>uniqid()
      ];
      if($request->refferal_code){
        if(User::where('refferal_code',$request->refferal_code)->exists()){
          User::where('refferal_code', $request->refferal_code)->update([
            'wallet_amount'=> User::where('refferal_code', $request->refferal_code)->pluck('wallet_amount')->first()+50
          ]);
         $userdata['wallet_amount'] =50;
        }
      }
      $user =  User::create($userdata);     
      $user->assignRole('customer');
      if($user) {
         /* $requestInfo['name'] = $name;
            $requestInfo['email'] = $request->email;
            $requestInfo['emailtoken'] = url('/register-student'). '/'.$token;           

            Mail::send('emails.verification', ['requestInfo' => $requestInfo], function ($m) use($requestInfo){
                $m->from('info@studentadvice.com', 'Student Advise');
                $m->to($requestInfo['email']  , $requestInfo['name'] )->subject('Student Advise - Verification');
            });*/
            $response['status'] = true; 
            $response['data'] = $user;
            $response['message'] = 'Your registration has been done as a customer.';
        } else {
            $response['status'] = false; 
            $response['data'] = null;
            $response['message'] = 'Unable to create customer.';            
        }      
        return response()->json($response, 200);
    }



public function login(Request $request)
    {
        $response = [];
        $response['status'] = false;
        $response['message'] = '';
        $response['data'] = null; 

            $validator = Validator::make($request->all(), [ 
                'mobile' => 'required|numeric',
                'password' => 'required|string|min:6|'           
            ]);        
            if ($validator->fails()) {                 
               $validateError = $validator->errors()->toArray();
              $firstkey = array_keys($validateError)[0];
              $error = $validateError[$firstkey][0];
              return response()->json(['status' => false,'message'=>$error,'data'=>null]);
            } 
            $usercheck = User::where(['mobile'=>$request->mobile])->first();   
            if(!empty($usercheck)){
             if($usercheck->status == "active"){
                 $credentials = $request->only('mobile', 'password');
                 if (Auth::attempt($credentials)) {
               
                    $userData = User::withCount('cart')->where('mobile',$request->mobile)->first();
                    $response['status'] = true;
                    $response['message'] = 'Login Successfully';
                    $response['data'] = $userData;
                    return response()->json($response, 200);
                 }else {
                     $response['message'] = 'Invalid phone number and password please try again.';
                     return response()->json($response, 200);
                }
             }else{
            $response['message'] = 'Your account is not in active mode please contact to administrator.';
            return response()->json($response, 200);
             }           

            }else{
                $response['message'] = 'You have not register with this phone number.';
                return response()->json($response, 200);
            }
    }
/**
 * @api {post} /near_by_store Request Store information
 * @apiName near_by_store
 * @apiGroup Stores
 *
 * @apiParam {string} latitude required
 * @apiParam {string} longitude required
 * @apiParam {integer} pincode required
  * @apiParam {integer} user_id optional
 
 */
  public function getStore(Request $request){
    //dd($request->toArray());
    $customer_id = $request->customer_id;
    $stores = User::Role('store')->withCount('reviews')->withCount(['favourite'=>function ($query) use ($customer_id) {
         $query->where('customer_id', $customer_id);
    }])->with('rating')->where(['status'=>'active','pincode'=>$request->pincode])->get();
    //dd($stores);
    if(count($stores)>0){
      foreach($stores as $key=>$value){
        unset($value['first_name']);
        unset($value['last_name']);
        unset($value['latitude']);
        unset($value['longitude']);
        unset($value['pincode']);
        unset($value['image']);
        unset($value['deleted_at']);
        $stores[$key] = $value;
        if(count($value['rating'])){
          $avg =$value['rating']['0']['avg_rating'];
          unset($value['rating']);
          $stores[$key]['rating'] = $avg;
        }else{
          unset($value['rating']);
           $stores[$key]['rating'] = "0";
        }
         $stores[$key]['is_favourite'] = $stores[$key]['favourite_count'];
         unset($stores[$key]['favourite_count']);
         //$stores[$key]['reviews'] = $stores[$key]['reviews_count'];
        // unset($stores[$key]['reviews_count']);
      }
    }
    if(count($stores)){
        $response['status'] = true;
         $response['image_path'] = url('/public/uploads/user/');
        $response['message'] = 'store list';
        $response['data'] = $stores;
        return response()->json($response, 200);
    }else{
        $response['status'] = false;
        $response['message'] = 'stores not found.';
        $response['data'] = null;
        return response()->json($response, 200);
    }
  }
  /**
 * @api {post} /cat_subcat Get stores categoreis
 * @apiName cat_subcat
 * @apiGroup Stores
 *
 * @apiParam {integer} store_id required
 */
  public function getStoreCategories(Request $request){
    $store_id = $request->store_id;
    $categories = Category::with('children:category_id,subcategory_id,store_id','children.category:id,name,image')->with(['children'=> function($q) use ($store_id) {
        $q->where('store_id',$store_id);
    }])->get(['id','name','image'])->toArray();
    $cat = [];
    $i=0;
    if(count($categories)>0){
      foreach($categories as $key=>$value){
        if(count($value['children'])>0){
          $cat[$i]=$value;
          foreach($value['children'] as $key=> $child){
            $cat[$i]['children'][$key]=$child['category'];
            $cat[$i]['children'][$key]['store_id']=$child['store_id'];
            $cat[$i]['children'][$key]['category_id']=$child['category_id'];
          }
          $i++;
        }
      }
    }
    //dd($cat);
    //$this->test_odd($categories->toArray());
    if(count($cat)){
        $response['status'] = true;
        $response['message'] = 'categories list';
        $response['image_path'] = url('/public/uploads/category/');
        $response['data'] = $cat;
        return response()->json($response, 200);
    }else{
        $response['status'] = false;
        $response['message'] = 'categories not found.';
        $response['data'] = null;
        return response()->json($response, 200);
    }
  }
 /* @api {post} /product_list Get products
 * @apiName product_list
 * @apiGroup products
 *
 * @apiParam {integer} store_id required
 * @apiParam {integer} category_id required
 * @apiParam {integer} subcategory_id required
  * @apiParam {integer} user_id optional
 */
  public function getProducts(Request $request){
    $customer_id = $request->customer_id;
    \DB::enableQueryLog();

     $product = New Product;
     $product=$product->newQuery();
    $product->with(['package.is_wishlist'=>function ($query) use ($customer_id) {
         $query->where('customer_id', $customer_id);
        
    }]);
    if (!empty($request->input('sort_by_price'))) {
      $sortkey = $request->sort_by_price;
      $product->whereHas('package',function ($q) use ($sortkey) {
        $q->orderBy('price', $sortkey);
      });
  }
    $product->with(['package.cart_package'=>function ($query) use ($customer_id) {
         $query->where('customer_id', $customer_id);
    }]);
    $product->with('brand:id,name','category:id,name','subcategory:id,name');
    $product->where(['subcategory_id'=>$request->subcategory_id,'category_id'=>$request->category_id]);
    $product->where('store_id',$request->store_id);
    if (!empty($request->input('brand_id'))) {
       $brand_ids = explode(',',$request->input('brand_id'));
       $product->whereIn('brand_id',$brand_ids);
    }
    $products = $product->get()->toArray();
    $query = \DB::getQueryLog();
    //$product->get();
    //dd($query);
    if($products){
        $response['status'] = true;
        $response['message'] = 'product list';
        $response['image_path'] = url('/public/uploads/product/');
        $response['data'] = $products;
        return response()->json($response, 200);
    }else{
        $response['status'] = false;
        $response['message'] = 'product not found.';
        $response['data'] = null;
        return response()->json($response, 200);
    }
  }
  /* @api {post} /wishlist_favourite/add_remove Add Remove wishlist and favourite
   * @apiName add_remove
   * @apiGroup products
   *
   * @apiParam {integer} store_id optional
   * @apiParam {integer} product_id optional
   * @apiParam {integer} type required 'store' or 'product'
   * @apiParam {integer} user_id optional
   */
  public function addRemoveWishlist(Request $request){
      //dd($request->toArray());
      if($request->type=='product'){
        if (Wishlist::where(['customer_id'=>$request->customer_id,'package_id'=>$request->package_id])->exists()) {
          DB::table('wishlists')->where(['customer_id'=>$request->customer_id,'package_id'=>$request->package_id])->delete();
          $response['status'] = true;
          $response['message'] = 'wishlist deleted.';
        }else{
          Wishlist::create([
            'customer_id' => $request->customer_id,
            'product_id' => $request->product_id,
            'package_id' => $request->package_id,
            'type' => $request->type,             
          ]); 
           $response['status'] = true;
          $response['message'] = 'wishlist added.';
        }
      }else{
        if (Wishlist::where(['customer_id'=>$request->customer_id,'store_id'=>$request->store_id])->exists()) {
          DB::table('wishlists')->where(['customer_id'=>$request->customer_id,'store_id'=>$request->store_id])->delete();
           $response['status'] = true;
          $response['message'] = 'favourite deleted.';
        }else{
          $user =  Wishlist::create([
            'customer_id' => $request->customer_id,
            'store_id' => $request->store_id,  
            'type' => $request->type,          
          ]); 
           $response['status'] = true;
          $response['message'] = 'favourite added.';
        }
      }
      return response()->json($response, 200);
  }
  public function addToCart(Request $request){
     $rules =  [
          'product_id' => 'required',
          'customer_id' => 'required',               
          'package_id' => 'required',
          'quantity' =>'required'
      ];
      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails()) {  
        return response()->json(['status' => false,'message'=>'Validaion Error','data'=>$validator->errors()]);
      } 
      if($request->quantity==0){
        //$product_cart = ProductCart::find($request->cart_id);
         // $product_cart->delete();
        DB::table('product_carts')->where(['customer_id'=>$request->customer_id,'product_id'=>$request->product_id,'package_id'=>$request->package_id])->delete();
         $response['status'] = true;
          $response['message'] = 'card data removed.';
          return response()->json($response, 200);
      } 
      if (ProductCart::where(['customer_id'=>$request->customer_id,'product_id'=>$request->product_id,'package_id'=>$request->package_id])->exists()) {
          ProductCart::where(['customer_id'=>$request->customer_id,'product_id'=>$request->product_id,'package_id'=>$request->package_id])->update(['quantity'=>$request->quantity]);
          $response['status'] = true;
          $response['message'] = 'product quantity updated.';
      }else{
          ProductCart::create($request->toArray());
          $response['status'] = true;
          $response['message'] = 'Product added successfully in cart.';
      }
      return response()->json($response, 200);
  } 
  public function add_delivery_address(Request $request){
     $rules =  [
          'customer_id' => 'required',               
          'address' => 'required',
          'zipcode' =>'required|numeric',
          'landmark' => 'required',
          'type' =>'required'
      ];
      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails()) {  
        return response()->json(['status' => false,'message'=>'Validaion Error','data'=>$validator->errors()]);
      } 
      $data = Address::create($request->toArray());
      if ($data) {
          $response['status'] = true;
          $response['message'] = 'Address added quantity updated.';
          $response['data']['address_id'] = $data->id;
      }else{
          $response['status'] = false;
          $response['message'] = 'something went wrong. try again.';
      }
      return response()->json($response, 200);
  }
   public function delivery_address_list(Request $request){
      $data = Address::where('customer_id',$request->customer_id)->get()->toArray();
      if ($data) {
          $response['status'] = true;
          $response['message'] = 'Addresses list.';
          $response['data'] = $data;
      }else{
          $response['status'] = false;
          $response['data'] = null;
          $response['message'] = 'address not found.';
      }
      return response()->json($response, 200);
  } 
  public function brand_list(Request $request){
      $data = Brand::where('status','active')->get(['id','name'])->toArray();
      if ($data) {
          $response['status'] = true;
          $response['message'] = 'brand list.';
          $response['data'] = $data;
      }else{
          $response['status'] = false;
          $response['data'] = null;
          $response['message'] = 'brand not found.';
      }
      return response()->json($response, 200);
  }
  public function removeToCart(Request $request){
    if (ProductCart::where(['id'=>$request->cart_id])->exists()) {
          $product_cart = ProductCart::find($request->cart_id);
          $product_cart->delete();
          $response['status'] = true;
          $response['message'] = 'product removed from cart list.';
    }else{
         $response['status'] = false;
         $response['data'] = null;
          $response['message'] = 'product not exists in cart.';
    }
    return response()->json($response, 200);
  }
   public function removeAllToCart(Request $request){
    if (ProductCart::where(['customer_id'=>$request->customer_id])->exists()) {
         ProductCart::where(['customer_id'=>$request->customer_id])->delete();
          $response['status'] = true;
          $response['message'] = 'All products removed from cart list.';
    }else{
         $response['status'] = false;
          $response['message'] = 'Product not exists in cart.';
    }
    return response()->json($response, 200);
  }
  public function cartList(Request $request){
      $data = ProductCart::with('product.category:id,name','product.subcategory:id,name','package')->where(['customer_id'=>$request->customer_id])->get(['id','product_id','package_id','quantity']);
      $delivey_detail = User::where('id',$request->customer_id)->get(['delivery_charge','delivery_limit'])->first();
      if($data){
          $response['status'] = true;
          $response['message'] = 'Cart list data.';
          $response['image_path'] = url('/public/uploads/product/');
           $response['delivery_charge'] = $delivey_detail->delivery_charge;
            $response['delivery_limit'] = $delivey_detail->delivery_limit;
          $response['data'] = $data;
      }else{
          $response['status'] = false;
          $response['message'] = 'data not found.';
          $response['data'] = null;
      }
      return response()->json($response, 200);
  }
    public function wishlistItems(Request $request){
      $data = Wishlist::with('product.category:id,name','product.subcategory:id,name','package')->where(['customer_id'=>$request->customer_id,'type'=>'product'])->get(['id','product_id','package_id'])->toArray();
      //dd($data);
      if($data){
          $response['status'] = true;
          $response['message'] = 'Wishlist data.';
          $response['data'] = $data;
      }else{
          $response['status'] = false;
          $response['message'] = 'data not found.';
          $response['data'] = null;
      }
      return response()->json($response, 200);
  }
  public function myProfile(Request $request){
    $profiledata =User::where('id',$request->customer_id)->get(['name','first_name','last_name','email','mobile','pincode','image'])->first();
    if($profiledata){
          $response['image_path'] = url('/public/uploads/user/');
          $response['status'] = true;
          $response['message'] = 'profile data.';
          $response['data'] = $profiledata;
      }else{
          $response['status'] = false;
          $response['message'] = 'data not found.';
          $response['data'] = null;
      }
      return response()->json($response, 200);
  }
  public function updateProfile(Request $request){
    $rules =  [
          'first_name' => 'required',
          //'last_name' => 'required',               
          'email' => 'nullable|string|email',
          //'mobile' =>'required|numeric|unique:users',
          'mobile' =>'required|numeric|unique:users,mobile,'.$request->customer_id,
          'pincode'=>'required|numeric',
          
      ];
      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails()) {  
        return response()->json(['status' => false,'message'=>'Validaion Error','data'=>$validator->errors()]);
      }   
        $filename=null;
        if($request->hasfile('profile_image')) { 
          $file = $request->file('profile_image');
          $extension = $file->getClientOriginalExtension(); // getting image extension
          $filename =time().'_'.str_replace(' ','_',$file->getClientOriginalName());
          $file->move('public/uploads/product', $filename);
          $request->request->add(['image'=>$filename]); 
          //$request->request->remove('profile_image'); 
        }
        $requestname=$request->first_name.' '.$request->last_name;
        //array_merge($request->all(), ['name' => $requestname,'image'=>$filename]);
        $request->request->add(['name' => $requestname]); 
        //dd($request->except('profile_image'));

        $status = User::where('id', $request->customer_id)->update($request->except(['profile_image','customer_id']));           
       if($status){
         $profiledata =User::where('id',$request->customer_id)->get(['name','first_name','last_name','email','mobile','pincode','image'])->first();
          $response['image_path'] = url('/public/uploads/user/');
          $response['status'] = true;
          $response['message'] = 'Profile updated.';
          $response['data'] = $profiledata;
      }else{
          $response['status'] = false;
          $response['message'] = 'Something went wrong.';
          $response['data'] = null;
      }
      return response()->json($response, 200);
  }
  public function productDetail(Request $request){
    //$product =Product::with('package')->where('id',$request->product_id)->first();
    $customer_id = $request->customer_id;
    $product = Product::with(['package.is_wishlist'=>function ($query) use ($customer_id) {
         $query->where('customer_id', $customer_id);
    }])->with(['package.cart_package'=>function ($query) use ($customer_id) {
         $query->where('customer_id', $customer_id);
    }])->with('brand:id,name','category:id,name','subcategory:id,name')->where('id',$request->product_id)->get()->toArray();
    if($product){
          $response['image_path'] = url('/public/uploads/product/');
          $response['status'] = true;
          $response['message'] = 'product data.';
          $response['data'] = $product;
      }else{
          $response['status'] = false;
          $response['message'] = 'data not found.';
          $response['data'] = null;
      }
      return response()->json($response, 200);
  }
  public function banners(){
    $banners =Banner::where('status','active')->get()->toArray();
    if($banners){
          $response['image_path'] = url('/public/uploads/banner/');
          $response['status'] = true;
          $response['message'] = 'product data.';
          $response['data'] = $banners;
      }else{
          $response['status'] = false;
          $response['message'] = 'data not found.';
          $response['data'] = null;
      }
      return response()->json($response, 200);
  }
  public function checkout(Request $request){
         $rules=[
          'customer_id' => 'required',
         'delivery_address_id' => 'required',
         'sub_total' => 'required',
         'delivery_charge' => 'required',
          
      ];
      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails()) {  
        return response()->json(['status' => false,'message'=>'Validaion Error','data'=>$validator->errors()]);
      }   
      //dd($request->toArray());
      $address = Address::where('id',$request->delivery_address_id)->pluck('address')->first();
      $carts = ProductCart::with('package.product')->where('customer_id',$request->customer_id)->get()->toArray();
       $status=false;
      if($carts){
        $orderdata =[
        'customer_id'=>$request->customer_id,
        'invoice_id'=>uniqid(),
        'item_count'=>count($carts),
        'order_time'=>date('h:i A'),
        'sub_total'=>$request->sub_total,
        'delivery_charge'=>$request->delivery_charge,
        'total_amount'=>$request->sub_total+$request->delivery_charg,
        'delivery_address'=>$address,
        'payment_type'=>$request->payment_type,
      ];
       $order = Order::create($orderdata);
        foreach($carts as $cart){
          $orderdetail =[
            'order_id'=>$order->id,
            'product_id'=>$cart['product_id'],
             'product_name'=>$cart['package']['product']['name'],
            'quantity'=>$cart['quantity'],
            'packet_weight'=>$cart['package']['packet_weight'],
            'price'=>$cart['package']['price'],
            'offer_price'=>$cart['package']['offer_price'],
            'saved_amount'=>$cart['package']['saved_amount'],
            'image'=>$cart['package']['image'],
          ];
          if(OrderDetail::create($orderdetail)){
            $status=true;
          }else{
            $status=false;
          }
        }
      }
    if($status){
          ProductCart::where('customer_id',$request->customer_id)->delete();
          $response['status'] = true;
          $response['message'] = 'You have successfully ordered.';
          $response['data']['order_id'] = $order->id;

      }else{
          $response['status'] = false;
          $response['message'] = 'Your cart list is empty.';
          $response['data'] = null;
      }
      return response()->json($response, 200);
  }
  public function myorders(Request $request){
    $data = Order::where('customer_id',$request->customer_id)->get(['id','order_status','item_count','total_amount','delivery_charge','created_at'])->toArray();
    if($data){
          $response['status'] = true;
          $response['message'] = 'My order list.';
          $response['data'] = $data;
      }else{
          $response['status'] = false;
          $response['message'] = 'order data not found.';
          $response['data'] = null;
      }
      return response()->json($response, 200);
  }
  public function orderdetail(Request $request){
    $data = Order::where(['id'=>$request->order_id])->first();
    if($data){
          $response['status'] = true;
          $response['message'] = 'My order details.';
          $response['data'] = $data;
      }else{
          $response['status'] = false;
          $response['message'] = 'order data not found.';
          $response['data'] = null;
      }
      return response()->json($response, 200);
  } 
  public function itemsInOrder(Request $request){
    $data = OrderDetail::where(['order_id'=>$request->order_id])->get();
    if($data){
          $response['status'] = true;
          $response['image_path'] = url('/public/uploads/productdetail/');
          $response['message'] = 'order items list.';
          $response['data'] = $data;
      }else{
          $response['status'] = false;
          $response['message'] = 'order items list not found.';
          $response['data'] = null;
      }
      return response()->json($response, 200);
  }
  public function cancelOrder(Request $request){
    $data = Order::where('id',$request->order_id)->update(['order_status'=>'cencelled']);
    if($data){
         // OrderDetail::where('order_id',$request->order_id)->delete();
          $response['status'] = true;
          $response['message'] = 'Your order has been cancelled.';
      }else{
          $response['status'] = false;
          $response['message'] = 'something went wrong.try again.';
      }
      return response()->json($response, 200);
  }
  public function walletAndReferal(Request $request){
    $data = User::where('id',$request->customer_id)->get(['refferal_code','wallet_amount'])->first()->toArray();
    if($data){
          $response['status'] = true;
          $response['message'] = 'refferal code and wallet amout.';
          $response['data']=$data;
      }else{
          $response['status'] = false;
          $response['message'] = 'no data found.';
           $response['data']=null;
      }
      return response()->json($response, 200);
  }
}
