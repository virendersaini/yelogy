<?php

namespace App\Http\Controllers\Admin;
use App\User;
use Redirect;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\HelperDetails;
use App\HelperVettings;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Market;


class JustHelperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $users = User::with('helperdetails','helpervettings')->role('helper')->get();
        return view('admin.just_helper.index',compact('users'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Input::get('category');
        $marketings = Market::orderBy('id','desc')->get();
        return view('admin.just_helper.create',compact('category','marketings'));
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
            'first_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'last_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|email',
            'phone_number' => 'required'
        ]);
        $data = $request->all();

        $data['name'] = $request->first_name." ".$request->last_name;
        
        $randomPassword = random_password();
        //$randomPassword = '123456';
        $data['password'] = Hash::make($randomPassword);
        
        $user = User::create($data);

        $check = $user->assignRole('helper');
        $dob = changeDateFormat($request->dob);
        $interview_date = changeDateFormat($request->interview_date);
        $start_date = changeDateFormat($request->start_date);
        $end_date = changeDateFormat($request->end_date);
        $visa_date = changeDateFormat($request->visa_date);
        $crb = changeDateFormat($request->crb);
        $policy_expiry_date = changeDateFormat($request->policy_expiry_date);

        
        $helperDetails = HelperDetails::create(
                array_merge($request->all(),
                    array(
                        'uid'=>$user->id,
                        'dob'=>$dob,
                        'interview_date'=>$interview_date,
                        'start_date'=>$start_date,
                        'end_date'=>$end_date,
                    )
                ));

        $helperVettings = HelperVettings::create(
                array_merge($request->all(),
                    array(
                        'helper_id'=>$user->id,
                        'visa_date'=>$visa_date,
                        'crb'=>$crb,
                        'policy_expiry_date'=>$policy_expiry_date
                    )));
        if($user){
            if(!empty($request->hasFile('photo_id'))){                
                 $user->addMedia($request->file('photo_id'))->toMediaCollection('helper_photo');
            }
            if(!empty($request->hasFile('address_proof'))){                
                $user->addMedia($request->file('address_proof'))->toMediaCollection('helper_address_proof');
            }
            if(!empty($request->hasFile('upload_policy'))){                
                $user->addMedia($request->file('upload_policy'))->toMediaCollection('helper_upload_policy');
            }
            if(!empty($request->hasFile('reference1'))){                
                $user->addMedia($request->file('reference1'))->toMediaCollection('helper_reference1');
            }
            if(!empty($request->hasFile('reference2'))){                
                $user->addMedia($request->file('reference2'))->toMediaCollection('helper_reference2');
            }

        }
        

        if ($check) {
            return redirect(url('/admin/just-helper'))->with('success', 'Helper Created Successfully.');
        }else{
            return redirect(url('/admin/just-helper'))->with('error', 'Something went wrong, Please try again.');
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
        $user = User::with('helperdetails','helpervettings')->findOrFail($id);
        return view('admin.just_helper.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with('helperdetails','helpervettings')->findOrFail($id);
        $marketings = Market::orderBy('id','desc')->get();

        return view('admin.just_helper.edit', compact('user','marketings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $request->validate([
            'first_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'last_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|email',
            'phone_number' => 'required'
        ]);
        $input = $request->all();
        $name = $request->first_name." ".$request->last_name;
        $user = User::findOrFail($id);
        $update = $user->update(
            array_merge(
                $request->only('first_name','last_name','phone_number'),
                array('name'=>$name)
            ));

        $dob = changeDateFormat($request->dob);
        $interview_date = changeDateFormat($request->interview_date);
        $start_date = changeDateFormat($request->start_date);
        $end_date = changeDateFormat($request->end_date);
        $visa_date = changeDateFormat($request->visa_date);
        $crb = changeDateFormat($request->crb);
        $policy_expiry_date = changeDateFormat($request->policy_expiry_date);


        $user->helperdetails->update(array_merge($request->all(),
                    array(
                        'dob'=>$dob,
                        'interview_date'=>$interview_date,
                        'start_date'=>$start_date,
                        'end_date'=>$end_date,
                    )
                ));

        $user->helpervettings->update(
                array_merge($request->all(),
                    array(
                        'visa_date'=>$visa_date,
                        'crb'=>$crb,
                        'policy_expiry_date'=>$policy_expiry_date
                    )));

        if(!empty($request->hasFile('photo_id'))){  
                $mediaItems = $user->getFirstMedia('helper_photo');
                optional($mediaItems)->delete();               
                $user->addMedia($request->file('photo_id'))->toMediaCollection('helper_photo');
            }
            if(!empty($request->hasFile('address_proof'))){
                $mediaItems = $user->getFirstMedia('helper_address_proof');
                optional($mediaItems)->delete(); 
                $user->addMedia($request->file('address_proof'))->toMediaCollection('helper_address_proof');
            }
            if(!empty($request->hasFile('upload_policy'))){    
                $mediaItems = $user->getFirstMedia('helper_upload_policy');
                optional($mediaItems)->delete();            
                $user->addMedia($request->file('upload_policy'))->toMediaCollection('helper_upload_policy');
            }
            if(!empty($request->hasFile('reference1'))){       
            $mediaItems = $user->getFirstMedia('helper_reference1');
                optional($mediaItems)->delete();           
                $user->addMedia($request->file('reference1'))->toMediaCollection('helper_reference1');
            }
            if(!empty($request->hasFile('reference2'))){    
            $mediaItems = $user->getFirstMedia('helper_reference2');
                optional($mediaItems)->delete();               
                $user->addMedia($request->file('reference2'))->toMediaCollection('helper_reference2');
            }

        if ($update) {
            return redirect(url('/admin/just-helper'))->with('success', 'Helper Data Updated Successfully.');
        }else{
            return redirect(url('/admin/just-helper'))->with('error', 'Something went wrong, Please try again.');
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
        $user = User::findOrFail($id);
        optional($user->helpervettings)->delete();
        optional($user->helperdetails)->delete();
        $user->delete();  

        if ($user) {
            return redirect(url('/admin/just-helper'))->with('success', 'Record Deleted.');
        }else{
            return redirect(url('/admin/just-helper'))->with('error', 'Something went wrong, Please try again.');
        }
    }


    public function dashboard(){
        return view('helper.dashboard');
    }
    public function userList(){
       $userQuery = User::orderBy('id','DESC');
       return $data = DataTables::of($userQuery)
        ->addColumn('user_role', function ($user){
                return $user->getRoleNames()->first();
            })
        ->addColumn('status', function ($user){
            $check = $user->status ? 'checked' : "";
                return '<label class="switch switch-3d switch-success"><input type="checkbox" id="switch_input_'.$user->id.'" name="'.$user->id.'" class="switch-input" '.$check.'><span class="switch-label"></span><span class="switch-handle"></span></label>';
            })
        ->addColumn('action', function ($user){
                return '<a href="'.route('just-helper.edit',$user->id).'" class="text-primary"><i class="fa fa-edit"></i></a> 
                    <form action="'.route('just-helper.destroy',$user->id).'" method="POST" name="delete" class="dispfr">
                        '.csrf_field().'
                        '.method_field('DELETE').'
                        <a href="javascript:void(0)" -button-type="delete" class="deletemen delete-alert text-danger"><i class="fa fa-trash"></i></a>
                    </form>';
            })
        ->rawColumns(['user_role','status','action'])
        ->make(true);
    }

    public function changeStatus(Request $request){
        $user = User::find($request->id);
        $user->status = $request->status;
        $user->save();
        if ($user) {
            $request->session()->flash('success', 'Record Updated.. '); 
            //return redirect(url('/admin/just-helper'))->with('success', 'Record Updated.');
            die;
        }else{
            return redirect(url('/admin/just-helper'))->with('error', 'Something went wrong, Please try again.');
        }
    }
    
}
