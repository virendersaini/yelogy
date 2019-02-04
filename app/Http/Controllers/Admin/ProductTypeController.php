<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use App\Brand;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tags_manager.product_type.index');
    }

    public function producttypeList(){
       $Query = Brand::orderBy('id','DESC');
       return $data = DataTables::of($Query)
        ->addColumn('action', function ($producttype){
                return '<a href="javascript:void(0)" name="'.$producttype->id.'" id="edit_'.$producttype->id.'" class="text-primary"><i class="fa fa-edit"></i></a>
                    <a href="javascript:void(0)" -button-type="delete" class="deletemen delete-alert text-danger"><i class="fa fa-trash"></i></a> 
                    <form action="'.route('producttype.destroy',$producttype->id).'" method="POST" id="delete" name="delete" class="dispfr">
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
        return view('admin.tags_manager.product_type.create');
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
            'name' => "required|unique:brands",
        ]);
        $data = $request->all();
        $producttype = Brand::create($data);
        if ($producttype) {
            $dataRequest['status'] = true;
            $dataRequest['message'] = "Brand Saved Successfully.";
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producttype = Brand::findOrFail($id);
        return view('admin.tags_manager.product_type.edit', compact('producttype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => "required",
        ]);
        $input = $request->all();
        $tag = Brand::findOrFail($id);
        $tag->update($input);
        if ($tag) {
            $dataRequest['status'] = true;
            $dataRequest['message'] = "Product Type Updated Successfully.";
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producttype = Brand::find($id);
        $producttype->delete();
        if ($producttype) {
            return redirect(url('/admin/producttype'))->with('success', 'Record Deleted.');
        }else{
            return redirect(url('/admin/producttype'))->with('error', 'Something went wrong, Please try again.');
        }
    }
}
