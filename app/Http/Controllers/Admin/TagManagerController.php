<?php

namespace App\Http\Controllers\Admin;
use Validator;
use App\TagManager;
use App\TagtypeManager;
use Illuminate\Http\Request;
use App\DataTables\TagtypeManagerDataTable;
use App\Http\Controllers\Controller;

class TagManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        return view('admin.tags_manager.tags.index');
    }

    public function tagListing(TagtypeManagerDataTable $dataTable){
        return $dataTable->render("admin.tags_manager.tags.tag_listing");
    }

    public function tagList(){
       $userQuery = TagManager::orderBy('id','DESC');
       return $data = DataTables::of($userQuery)
        ->addColumn('action', function ($tag){
                return '<a href="javascript:void(0)" name="'.$tag->id.'" id="edit_'.$tag->id.'" class="text-primary"><i class="fa fa-edit"></i></a>
                    <a href="javascript:void(0)" -button-type="delete" class="deletemen delete-alert text-danger"><i class="fa fa-trash"></i></a> 
                    <form action="'.route('tag-manager.destroy',$tag->id).'" method="POST" name="delete" class="dispfr">
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
        $queryString = \Request::all();
        $tags_manager = TagtypeManager::pluck('name', 'id')->all();
        return view('admin.tags_manager.tags.create',compact("queryString", "tags_manager"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [];
        if ($request->label_name == "Tag Name") {
                $rules['tagtype_manager_id'] = 'required';
                $rules['name.*'] = 'required';
        }else{
            $rules['name.*'] = 'required';
        }
        $validator = Validator::make($request->all(), $rules);
        if ($validator->passes()) {
            foreach($request->input('name') as $key => $value) {
                if ($request->label_name == "Tag Name") {
                    TagManager::create(['tag_name' => $value, 'tagtype_manager_id' => $request->tagtype_manager_id]);
                }else{
                    TagtypeManager::create(['name' => $value, 'map_type' => $request->input('map_type'), 'type' => $request->input('type')]);
                }
            }
            return response()->json(['status'=>'true', 'message' => 'Tag Saved Successfully.']);
        }
        return response()->json(['status'=>'error','error'=>$validator->errors()]);
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
        $tag = TagtypeManager::find($id);
        return view('admin.tags_manager.tags.edit', compact('tag'));
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
            //'tag_type' => "required",
            'name' => "required",
        ]);
        $input = $request->all();
        $tag = TagtypeManager::find($id);
        $tag->update($input);
        if ($tag) {
            $dataRequest['status'] = true;
            $dataRequest['message'] = "Tag Updated Successfully.";
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
        $tag = TagManager::find($id);
        $tag->delete();
        if ($tag) {
            return redirect(url('/admin/tag-manager'))->with('success', 'Record Deleted.');
        }else{
            return redirect(url('/admin/tag-manager'))->with('error', 'Something went wrong, Please try again.');
        }
    }
}
