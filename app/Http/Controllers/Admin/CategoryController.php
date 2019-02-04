<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producttypes = Category::where('parent_id',0)->orderBy('id','desc')->get();
        return view('admin.category.index',compact('producttypes'));
    }

    public function categoryList(){
       $userQuery = Category::with('parent')->orderBy('id','DESC');
       return $data = DataTables::of($userQuery)
        ->addColumn('action', function ($product){
                return '<a href="javascript:void(0)" name="'.$product->id.'" id="edit_'.$product->id.'" class="text-primary"><i class="fa fa-edit"></i></a>
                    <a href="javascript:void(0)" -button-type="delete" class="deletemen delete-alert text-danger"><i class="fa fa-trash"></i></a> 
                    <form action="'.route('category.destroy',$product->id).'" method="POST" id="delete" name="delete" class="dispfr">
                        '.csrf_field().'
                        '.method_field('DELETE').'                        
                    </form>';
            })
        ->addColumn('parent_category',function($product){
            if($product->parent){
                return $product->parent->name;
            }else{
                return '';
            }
        })
        ->addColumn('image',function($product){
            return '<img src="public/uploads/banner'.$product->image.'" width="100px"></img>'; 
            //Html::image("public/uploads/banner/".$product->image,"",array("width"=>"100px"));
        })
        ->rawColumns(['action','image'])
        ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'name' => "required|unique:products",
           // 'parent_id' => "required",
        ]);
        $data = $request->all();
        $filename=null;
        if($request->hasfile('image')) { 
          $file = $request->file('image');
          $extension = $file->getClientOriginalExtension(); // getting image extension
          $filename =time().'_'.str_replace(' ','_',$file->getClientOriginalName());
          $file->move('public/uploads/category', $filename);
          $data['image'] = $filename;
        }
        $user = Category::create($data);
        
        if ($user) {
            $dataRequest['status'] = true;
            $dataRequest['message'] = "Category Saved Successfully.";
            return response()->json($dataRequest, 200);
        }else{
            $dataRequest['status'] = flase;
            $dataRequest['message'] = "Somthing went wrong, PLease tr again.";
            return response()->json($dataRequest, 200);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
         $product = Category::find($id);
         $producttypes = Category::where('parent_id',0)->orderBy('id','desc')->get();
        return view('admin.category.edit', compact('product','producttypes'));
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
       /* $request->validate([
            'name' => "required",
            //'producttype_id' => "required",
        ]);*/
        $input = $request->all();
       //unset($input['category_image']);
        $product = Category::find($id);
         $filename=null;
        if($request->hasfile('image')) { 
          $file = $request->file('image');
          $extension = $file->getClientOriginalExtension(); // getting image extension
         
           $filename =time().'_'.str_replace(' ','_',$file->getClientOriginalName());
          $file->move('public/uploads/category', $filename);
          $input['image'] = $filename;
        }
        $product->update($input);
        
         /*if($request->hasFile('category_image')){
            echo "dontettt";
            $product->addMedia($request->category_image)->toMediaCollection('category_image');
        }*/
         
        if ($product) {
            $dataRequest['status'] = true;
            $dataRequest['message'] = "Category Updated Successfully.";
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
