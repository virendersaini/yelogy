<?php

namespace App\Http\Controllers\Admin;

use App\Market;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class MarketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.marketing.index');
    }

    public function marketList(){
       $userQuery = Market::orderBy('id','DESC');
       return $data = DataTables::of($userQuery)
        ->addColumn('action', function ($market){
                return '<a href="javascript:void(0)" name="'.$market->id.'" id="edit_'.$market->id.'" class="text-primary"><i class="fa fa-edit"></i></a>
                    <a href="javascript:void(0)" -button-type="delete" class="deletemen delete-alert text-danger"><i class="fa fa-trash"></i></a> 
                    <form action="'.route('marketing.destroy',$market->id).'" method="POST" id="delete" name="delete" class="dispfr">
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
        return view('admin.marketing.create');
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
        $user = Market::create($data);
        if ($user) {
            $dataRequest['status'] = true;
            $dataRequest['message'] = "Market fields Saved Successfully.";
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
     * @param  \App\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function show(Market $market)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function edit(Market $market, $id)
    {
        $market = Market::find($id);
        return view('admin.marketing.edit', compact('market'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => "required",
        ]);
        $input = $request->all();
        $tag = Market::find($id);
        $tag->update($input);
        if ($tag) {
            $dataRequest['status'] = true;
            $dataRequest['message'] = "Market fields Updated Successfully.";
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
     * @param  \App\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $market = Market::find($id);
        $market->delete();
        if ($market) {
            return redirect(url('/admin/marketing'))->with('success', 'Record Deleted.');
        }else{
            return redirect(url('/admin/marketing'))->with('error', 'Something went wrong, Please try again.');
        }
    }
}
