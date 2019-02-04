<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\ProductDetail;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Brand;
use App\Category;
use App\User;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producttypes = Brand::orderBy('id','desc')->get();
        $category = Category::where('parent_id',0)->orderBy('id','desc')->get();
        $stores = User::role('store')->where('status','active')->get();
       // dd($stores->toArray());
        return view('admin.product.index',compact('producttypes','category','stores'));
    }

    public function productList(){
       $userQuery = Product::orderBy('id','DESC');
       return $data = DataTables::of($userQuery)
        ->addColumn('action', function ($product){
                return '<a href="javascript:void(0)" name="'.$product->id.'" id="edit_'.$product->id.'" class="text-primary"><i class="fa fa-edit"></i></a>
                    <a href="javascript:void(0)" -button-type="delete" class="deletemen delete-alert text-danger"><i class="fa fa-trash"></i></a> 
                    <form action="'.route('product.destroy',$product->id).'" method="POST" id="delete" name="delete" class="dispfr">
                        '.csrf_field().'
                        '.method_field('DELETE').'                        
                    </form>';
            })
        ->rawColumns(['action'])
        ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producttypes = Brand::orderBy('id','desc')->get();
        $category = Category::where('parent_id',0)->orderBy('id','desc')->get();
        $stores = User::role('store')->where('status','active')->get();
        return view('admin.product.create',compact('producttypes','category','stores'));
    }
public function addMore($id=null,$addmore=null){

        return view('admin.product.add_more', compact('id','addmore'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $data = $request->all();
         
        
        $request->validate([
            'name' => "required|unique:products",
            'brand_id' => "required",
            'category_id' => "required",
            //'subcategory_id' => "required",
            'user_id' => "required",
            //'price' => 'required|numeric|between:0,1000.99',
            'price' => 'required',
            'offer_price' => 'required',
        ]);
        $data = $request->all();
        $filename=null;
        $productdetailarray=[];
        $i=0;
        if($data['image']){
        foreach($data['image'] as $key=>$value){
            if($value) {
              $file = $value;
              $extension = $file->getClientOriginalExtension(); // getting image extension
              $filename =time().'_'.str_replace(' ','_',$file->getClientOriginalName());
              $file->move('public/uploads/productdetail', $filename);
            }
            $productdetailarray[$i]['image'] =$filename;
            $productdetailarray[$i]['price'] = $data['price'][$key];
            $productdetailarray[$i]['packet_weight'] = $data['packet_weight'][$key];
            $productdetailarray[$i]['offer_price'] = $data['offer_price'][$key];
            $productdetailarray[$i]['is_in_stock'] = $data['is_in_stock'][$key];
            $i++;
        }
    }
    //dd($productdetailarray);
        $data['store_id']=$data['user_id'];
        unset($data['user_id']);
        unset($data['price']);
        unset($data['packet_weight']);
        unset($data['offer_price']);
        unset($data['is_in_stock']);
        unset($data['image']);
        $user = Product::create($data);
        if ($user) {
            $product = Product::find($user->id);
            //dd($product);
            $product->package()->createMany([$productdetailarray]);
            return redirect(url('/admin/product'))->with('success', 'Product Saved Successfully.');
        }else{
            return redirect(url('/admin/product'))->with('error', 'Something went wrong, Please try again.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }
 public function subcategory(Request $request, $id)
    {

        $childcategory =Category::where('parent_id',$id)->orderBy('id','desc')->get();
        //dd($childcategory);
        return view('admin.product.subcategory', compact('childcategory'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
         $product = Product::find($id);
        $producttypes = Brand::orderBy('id','desc')->get();
        $category = Category::where('parent_id',0)->orderBy('id','desc')->get();
        $childcategory =Category::where('parent_id',$product->parent_category_id)->orderBy('id','desc')->get();
         $stores = User::role('store')->where('status','active')->get();
        return view('admin.product.edit', compact('product','producttypes','category','childcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->toArray());
        $request->validate([
            'name' => "required",
            'user_id' => "required",
            'brand_id' => "required",
            'category_id' => "required",
            'price' => 'required|numeric|between:0,1000.99',
        ]);
        $input = $request->all();

        $filename=null;
        if($request->hasfile('image')) { 
          $file = $request->file('image');
          $extension = $file->getClientOriginalExtension(); // getting image extension
          $filename =time().'_'.str_replace(' ','_',$file->getClientOriginalName());
          $file->move('public/uploads/product', $filename);
          $input['image'] = $filename;
        }


        $product = Product::find($id);
        $product->update($input);
        if ($product) {
            $dataRequest['status'] = true;
            $dataRequest['message'] = "Products Updated Successfully.";
            return response()->json($dataRequest, 200);
        }else{
            $dataRequest['status'] = flase;
            $dataRequest['message'] = "Somthing went wrong, PLease tr again.";
            return response()->json($dataRequest, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        if ($product) {
            return redirect(url('/admin/product'))->with('success', 'Record Deleted.');
        }else{
            return redirect(url('/admin/maketing'))->with('error', 'Something went wrong, Please try again.');
        }
    }
}
