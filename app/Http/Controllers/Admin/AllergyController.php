<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use App\Allergy;
class AllergyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.allergies.index');
    }

    public function allergyList(){
       $userQuery = Allergy::orderBy('id','DESC');
       return $data = DataTables::of($userQuery)
        ->addColumn('action', function ($Allergy){
                return '<a href="javascript:void(0)" name="'.$Allergy->id.'" id="edit_'.$Allergy->id.'" class="text-primary"><i class="fa fa-edit"></i></a>
                    <a href="javascript:void(0)" -button-type="delete" class="deletemen delete-alert text-danger"><i class="fa fa-trash"></i></a> 
                    <form action="'.route('allergies.destroy',$Allergy->id).'" method="POST" id="delete" name="delete" class="dispfr">
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
        return view('admin.allergies.create');
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
        $user = Allergy::create($data);
        if ($user) {
            $dataRequest['status'] = true;
            $dataRequest['message'] = "Allergy fields Saved Successfully.";
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
        $allergy = Allergy::find($id);
        return view('admin.allergies.edit', compact('allergy'));
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
        $tag = Allergy::find($id);
        $tag->update($input);
        if ($tag) {
            $dataRequest['status'] = true;
            $dataRequest['message'] = "Allergy fields Updated Successfully.";
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
        $allergy = Allergy::find($id);
        $allergy->delete();
        if ($allergy) {
            return redirect(url('/admin/allergies'))->with('success', 'Record Deleted.');
        }else{
            return redirect(url('/admin/allergies'))->with('error', 'Something went wrong, Please try again.');
        }
    }
}
