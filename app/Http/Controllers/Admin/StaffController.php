<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\User;
use App\StaffDetails;
use App\Disc;
use App\Allergy;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::whereNotIn('name',['admin','customer','helper'])->get();
        $users = User::with('staffdetails','roles')->role($roles)->get();
        return view('admin.staff.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $discs = Disc::all();
        $allergies = Allergy::all();
        return view('admin.staff.create',compact('discs','allergies'));
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
            'title' => 'required',
            'first_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'last_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'address' => 'required',
            'address2' => 'required',
            'county' => 'required',
            'postcode' => 'required',
            'phone_number' => 'required',
            'mobile' => 'required',
            'dob' => 'required',
            'age' => 'required',
            'next_of_kin' => 'required',
            'relation_next_of_kin' => 'required',
            'uk_driving_licence' => 'required',
            'own_car' => 'required',
            'nationality' => 'required',
            'national_insurance_number'=> 'required',
            'allergy' => 'required',
            'user_group' => 'required',
            'disc' =>'required',
            'bankName'=>'required',
            'accountHolderName'=>'required',
            'accountNumber' => 'required',
            'sortCode' =>'required',
            'joining_date' => 'required',
            'email' => 'required|email|unique:users',
        ]);


        $data = $request->all();

        $joining_date = changeDateFormat($request->joining_date);
        $dob = changeDateFormat($request->dob);
        $randomPassword = random_password();

        $data['name'] = $request->first_name." ".$request->last_name;
        $data['password'] = Hash::make($request->password);
        $data['status'] = 'active';
        $data['save_password'] = $request->password;
        $user = User::create($data);

        if($user){
            if(!empty($request->hasFile('addpress_proof'))){                
                 $user->addMedia($request->file('addpress_proof'))->toMediaCollection('staff_address_proof');
            }
            if(!empty($request->hasFile('photo_id'))){                
                $user->addMedia($request->file('photo_id'))->toMediaCollection('staff_photo_id');
            }
        }

        $staffDetail = $request->except('title','first_name','last_name','phone_number','email'); 
        $check = $user->assignRole(array_values($request->user_group));
        
        StaffDetails::create(
            array_merge($staffDetail, 
                array(
                    "uid" => $user->id,
                    'joining_date'=>$joining_date,
                    'dob'=>$dob,
                    'allergy'=>json_encode($request->allergy),
                    'disc'=>json_encode($request->disc)
            ))
        ); 

        if ($check) {
            return redirect(url('/admin/staff'))->with('success', 'Staff Created Successfully');
        }else{
            return redirect(url('/admin/staff'))->with('error', 'Something went wrong, Please try again.');
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
        $user = User::with('staffdetails')->findOrFail($id);
        $role = $user->getRoleNames()->toArray();
        return view('admin.staff.show',compact('user','role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $discs = Disc::all();
        $allergies = Allergy::all();
        $user = User::with('staffdetails')->findOrFail($id);
        $role = $user->getRoleNames()->toArray();
        return view('admin.staff.edit',compact('user','role','discs','allergies'));
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
        $user = User::findOrFail($id);
        $name = $request->first_name." ".$request->last_name;
        $joining_date = changeDateFormat($request->joining_date);
        $dob = changeDateFormat($request->dob);

        $update = $user->update(
            array_merge(
                array('name'=>$name),
                $request->only('first_name','last_name','phone_number'))
            );
        $user->syncRoles(array_values($request->user_group));

        $user->staffdetails->update(
            array_merge(
                $request->except('title','first_name','last_name','phone_number','email'),
                array(
                    'joining_date'=>$joining_date,
                    'dob'=>$dob,
                    'allergy'=>json_encode($request->allergy),
                    'disc'=>json_encode($request->disc))
            ));
        if($user){
            if(!empty($request->hasFile('addpress_proof'))){   
                $mediaItems = $user->getFirstMedia('staff_address_proof');
                optional($mediaItems)->delete();                    
                $user->addMedia($request->file('addpress_proof'))->toMediaCollection('staff_address_proof');
            }
            if(!empty($request->hasFile('photo_id'))){    
                $mediaItems = $user->getFirstMedia('staff_photo_id');
                optional($mediaItems)->delete();                   
                $user->addMedia($request->file('photo_id'))->toMediaCollection('staff_photo_id');
            }
        }

        if($update){
            return redirect(url('/admin/staff'))->with('success', 'Staff Details Updated Successfully.');
        }else{
            return redirect(url('/admin/staff'))->with('error', 'Something went wrong, Please try again.');
        }
        die;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        if(!empty($id)){
            $user = User::findOrFail($id);
            $user->staffdetails->delete();
            $user->delete();            
                  
            if(!empty($user)){
                return back()->with('success','Staff Deleted Successfully.');
            }else{
                return back()->with('error', 'Unable to process your request.');
            } 
        }else{
            return back()->with('error', 'Unable to process your request.');
        }
    }
}
