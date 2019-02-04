<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use App\HelperQuality;

class HelperQualityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tags_manager.helper_quality.index');
    }

    public function helperqualityList(){
       $Query = HelperQuality::orderBy('id','DESC');
       return $data = DataTables::of($Query)
        ->addColumn('action', function ($helperquality){
                return '<a href="javascript:void(0)" name="'.$helperquality->id.'" id="edit_'.$helperquality->id.'" class="text-primary"><i class="fa fa-edit"></i></a>
                    <a href="javascript:void(0)" -button-type="delete" class="deletemen delete-alert text-danger"><i class="fa fa-trash"></i></a> 
                    <form action="'.route('helperquality.destroy',$helperquality->id).'" method="POST" id="delete" name="delete" class="dispfr">
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
        return view('admin.tags_manager.helper_quality.create');
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
            'name' => "required|unique:markets",
        ]);
        $data = $request->all();
        $helperquality = HelperQuality::create($data);
        if ($helperquality) {
            $dataRequest['status'] = true;
            $dataRequest['message'] = "HelperQuality Saved Successfully.";
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
        $helperquality = HelperQuality::findOrFail($id);
        return view('admin.tags_manager.helper_quality.edit', compact('helperquality'));
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
        $tag = HelperQuality::findOrFail($id);
        $tag->update($input);
        if ($tag) {
            $dataRequest['status'] = true;
            $dataRequest['message'] = "HelperQuality Updated Successfully.";
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
        $helperquality = HelperQuality::find($id);
        $helperquality->delete();
        if ($helperquality) {
            return redirect(url('/admin/helperquality'))->with('success', 'Record Deleted.');
        }else{
            return redirect(url('/admin/helperquality'))->with('error', 'Something went wrong, Please try again.');
        }
    }
}
