<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Customer;
use App\HouseMap;
use App\Market;
use App\Disc;
use App\Allergy;
use App\SpecialCare;
use App\Package;
use App\TagtypeManager;
use App\TagManager;
use App\Brand;
use App\Product;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use App\Banner;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $customer = User::role('store')->get();
        return view('admin.customer.index', compact("customer"));
    }
    public function banners(){
        $customer = Banner::with('product')->get();
        return view('admin.customer.banners', compact("customer"));
    }
    public function bannerCreate(){
        $products = Product::where('status','active')->pluck('name','id');
        return view('admin.customer.banner_create',compact('products'));
    }
    public function bannerEdit($id=null){
        $products = Product::where('status','active')->pluck('name','id');
         $customer = Banner::with('product')->where('id',$id)->first();
         return view('admin.customer.banner_edit',compact('customer','products'));
    }
    public function addMore($id=null,$addmore=null){

        return view('admin.customer.add_more', compact('id','addmore'));
    }
    public function productListByProductType($id=null){
        $product_list = Product::where(['status'=>'active','producttype_id'=>$id])->get();
        return view('admin.customer.product_list', compact('product_list'));
    }
    public function tag_manage($id=null,$type=null){
        $tagtypeManager =TagtypeManager::where('type',$type)->get();
        $tagManagers = TagManager::all();
        return view('admin.customer.'.$type, compact('id','type','tagtypeManager','tagManagers'));
    }
    public function addTag($type=null,$tag=null){
        $TagManager = new TagManager;
        $TagManager->tag_type = $type;
        $TagManager->tag_name = $tag;
        $TagManager->save();
        return $TagManager->id;
    }
    public function dashboard(){
        return view('customer.dashboard');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $request->validate([
            'first_name' => "required",
            'status' => "required",
            'store_type' => "required",
            'delivery_time' => "required",
            'email' => 'nullable|string|email',
            'mobile' =>'required|numeric|unique:users',
            'pincode'=>'required|numeric',
            'password' => 'required|string|min:6|',
        ]);

        //dd($request->toArray());
        $request->merge(["password" => Hash::make($request->password)]);

        $filename=null;
        if($request->hasfile('image')) { 
          $file = $request->file('image');
          $extension = $file->getClientOriginalExtension(); // getting image extension
        $filename =time().'_'.str_replace(' ','_',$file->getClientOriginalName());
          $file->move('public/uploads/user', $filename);
          $input['image'] =  $filename;
        }
        $input['name']=$request->first_name.' '.$request->last_name;

        $user = User::create($input);
        $check = $user->assignRole("store");
        if ($check) {
            return redirect(url('/admin/customer'))->with('success', 'Store created successfully. '); 
        }else{
            return redirect(url('/admin/customer'))->with('error', 'Something went wrong, Please try again.');
        }
    }
    public function bannerstore(Request $request)
    {
        $input = $request->all();
        $request->validate([
            'status' => "required",
            'banner_type' => "required",
            'image' => "required",
            'product_id'=>'required',
        ]);

        $filename=null;
        if($request->hasfile('image')) { 
          $file = $request->file('image');
          $extension = $file->getClientOriginalExtension(); // getting image extension
        $filename =time().'_'.str_replace(' ','_',$file->getClientOriginalName());
          $file->move('public/uploads/banner', $filename);
          $input['image'] =  $filename;
        }
        $user = Banner::create($input);
        if ($user) {
            return redirect(url('/admin/banners'))->with('success', 'Banner created successfully. '); 
        }else{
            return redirect(url('/admin/banners'))->with('error', 'Something went wrong, Please try again.');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.customer.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id=null)
    {
        $customer = User::where(["id" => $id])->first();
        return view('admin.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
       $request->validate([
            'first_name' => "required",
            'status' => "required",
            'store_type' => "required",
            'delivery_time' => "required",
            'email' => 'nullable|string|email',
            'mobile' =>'required|numeric|unique:users,mobile,'.$id,
            'pincode'=>'required|numeric',
        ]);
        $request->merge(["name" => $request->first_name.' '.$request->last_name]);

        $user = User::find($id);


         $filename=null;
        if($request->hasfile('image')) { 
          $file = $request->file('image');
          $extension = $file->getClientOriginalExtension(); // getting image extension
          $filename =time().'_'.str_replace(' ','_',$file->getClientOriginalName());
          $file->move('public/uploads/user', $filename);
          unset($request->image);
          $input['image'] =  $filename;
        }
        //dd($request->toArray());
        $input['name']=$request->first_name.' '.$request->last_name;
        //dd($input);
        if ($user->update($input)) {
            return redirect(url('/admin/customer'))->with('success', 'Store updated successfully. '); 
        }else{
            return redirect(url('/admin/customer'))->with('error', 'Something went wrong, Please try again.');
        }
    }
    public function bannerupdate(Request $request, $id)
    {
        $input = $request->all();
        //dd($input);
        $request->validate([
            'status' => "required",
            'banner_type' =>"required",
            'product_id'=>"required",
        ]);
        $user = Banner::find($id);
        $filename=null;
        if($request->hasfile('image')) { 
          $file = $request->file('image');
          $extension = $file->getClientOriginalExtension(); // getting image extension
          $filename =time().'_'.str_replace(' ','_',$file->getClientOriginalName());
          $file->move('public/uploads/banner', $filename);
          unset($request->image);
          $input['image'] =  $filename;
        }
        if ($user->update($input)) {
            return redirect(url('/admin/banners'))->with('success', 'Banner updated successfully. '); 
        }else{
            return redirect(url('/admin/banners'))->with('error', 'Something went wrong, Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function banner_destroy($id)
    {
         $user = Banner::findOrFail($id);
        $user->delete();  

        if ($user) {
            return redirect(url('/admin/banners'))->with('success', 'Banner Deleted.');
        }else{
            return redirect(url('/admin/banners'))->with('error', 'Something went wrong, Please try again.');
        }
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();  

        if ($user) {
            return redirect(url('/admin/customer'))->with('success', 'Store Deleted.');
        }else{
            return redirect(url('/admin/customer'))->with('error', 'Something went wrong, Please try again.');
        }
    }
}
