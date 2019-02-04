@extends('admin.layout.app')

@push('title')

JH Staffs Team Management

@endpush

@push('breadcrumbs')
<li><a href="index.html">Home</a></li>
<li class="active">Edit JH Staffs Team Management</li>
@endpush
	
@section('content')
<div class="row">
    <div class="col-sm-12">
        @formErrors {{-- Form Validation Errors --}}
        @endformErrors
    </div>
</div>
@flashMessage() {{-- Session Flash Messages --}}
@endflashMessage
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12 mb-2">                        
                <a href="javascript:void(0)" onclick="return window.history.back();" class="btn btn-primary pull-left mr-2"><i class="fa fa-angle-left"></i> Back</a>
                
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h4>Edit Team Member</h4>
                    </div>
                    {{ Form::open(array('route' => array('staff.update',$user->id)))}}                                           	{{ csrf_field() }}
    					<input type="hidden" name="_method" value="PUT">
	                    <div class="card-body">
	                        <div class="row">
	                            <div class="form-group col-md-4">
	                                <label for="first_name" class=" form-control-label">First Name</label>
	                                <input type="text" id="first_name" name="first_name" value="{{ old('first_name',$user->first_name) }}" class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}">
	                                @if ($errors->has('first_name'))
	                                    <span class="invalid-feedback">
	                                        <strong>{{ $errors->first('first_name') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                            <div class="form-group col-md-4">
	                                <label class=" form-control-label">Last Name</label>
	                                <input type="text" name="last_name" value="{{ old('last_name',$user->last_name) }}" class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}">
	                                @if ($errors->has('last_name'))
	                                    <span class="invalid-feedback">
	                                        <strong>{{ $errors->first('last_name') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                            <div class="form-group col-md-4">
	                                <label class=" form-control-label">Email</label>
	                                <input type="text" readonly="readonly" name="user_email" value="{{ old('user_email',$user->email) }}" class="form-control {{ $errors->has('user_email') ? ' is-invalid' : '' }}">
	                                @if ($errors->has('user_email'))
	                                    <span class="invalid-feedback">
	                                        <strong>{{ $errors->first('user_email') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                            <div class="form-group col-md-4">
	                                <label class=" form-control-label">Phone Number</label>
	                                <input type="text" name="phone_number" value="{{ old('phone_number',$user->phone_number) }}" class="form-control {{ $errors->has('phone_number') ? ' is-invalid' : '' }}">
	                                @if ($errors->has('phone_number'))
	                                    <span class="invalid-feedback">
	                                        <strong>{{ $errors->first('phone_number') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                            <div class="form-group col-md-4">
	                                <label class=" form-control-label">Address</label>
	                                <input type="text" name="address" value="{{ old('address',$user->staffdetails->address ?? '') }}" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}">
	                                @if ($errors->has('address'))
	                                    <span class="invalid-feedback">
	                                        <strong>{{ $errors->first('address') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                            <div class="form-group col-md-4">
	                                <label class=" form-control-label">City</label>
	                                <input type="text" name="city" value="{{ old('city',$user->staffdetails->city ?? '') }}" class="form-control {{ $errors->has('city') ? ' is-invalid' : '' }}">
	                                @if ($errors->has('address'))
	                                    <span class="invalid-feedback">
	                                        <strong>{{ $errors->first('address') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                            <div class="form-group col-md-4">
	                                <label class=" form-control-label">Joining Date</label>
	                                <input type="text" name="joining_date" value="{{ old('joining_date',$user->staffdetails->joining_date ?? '') }}" class="date form-control {{ $errors->has('joining_date') ? ' is-invalid' : '' }}">
	                                @if ($errors->has('joining_date'))
	                                    <span class="invalid-feedback">
	                                        <strong>{{ $errors->first('joining_date') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                            <div class="form-group col-md-4">
	                                <label class=" form-control-label">ID Proof Type</label>
	                                <select class="form-control {{ $errors->has('id_proof') ? ' is-invalid' : '' }}" name="id_proof">
	                                	<option value="">Select ID Proof Type</option> 
	                                    <option value="utr" {{ $user->staffdetails->id_proof ?? '' == 'utr' ? "selected='selected'" : ''  }}>UTR</option>                                
	                                    <option value="bank account" {{ $user->staffdetails->id_proof ?? '' == 'account' ? "selected='selected'" : ''  }}>Bank Account</option>
	                                </select>
	                                @if ($errors->has('id_proof'))
	                                    <span class="invalid-feedback">
	                                        <strong>{{ $errors->first('id_proof') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                            <div class="form-group col-md-4">
	                                <label class=" form-control-label">ID Proof Number</label>
	                                <input type="text" name="id_proof_number" value="{{ old('id_proof_number', $user->staffdetails->id_proof_number ?? '') }}" class="form-control {{ $errors->has('id_proof_number') ? ' is-invalid' : '' }}">
	                                @if ($errors->has('id_proof_number'))
	                                    <span class="invalid-feedback">
	                                        <strong>{{ $errors->first('id_proof_number') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                            <div class="form-group col-md-4">
	                                <label class=" form-control-label">Allergy/Phobia</label>
	                                <input type="text" name="allergy" value="{{ old('allergy') }}" class="form-control {{ $errors->has('allergy') ? ' is-invalid' : '' }}">
	                                @if ($errors->has('allergy'))
	                                    <span class="invalid-feedback">
	                                        <strong>{{ $errors->first('allergy') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                            <div class="form-group col-md-4">
                                	<label class=" form-control-label">Blood Group</label>
	                                <select name="blood_group" class="form-control">
	                                    <option value="A" {{ $user->staffdetails->blood_group == 'A' ? "selected='selected'" : ''  }}>A</option>  
	                                    <option value="B" {{ $user->staffdetails->blood_group == 'B' ? "selected='selected'" : ''  }}>B</option>
	                                    <option value="O" {{ $user->staffdetails->blood_group == 'O' ? "selected='selected'" : ''  }}>O</option>
	                                    <option value="AB" {{ $user->staffdetails->blood_group == 'AB' ? "selected='selected'" : ''  }}>AB</option>
	                                </select>
	                            </div>
	                            <div class="form-group col-md-4">
	                                <label class=" form-control-label">User Group</label>
	                                <select name="user_group" class="form-control">
	                                	<option value="">Select Role</option>                      
	                                    <option value="interview supervisor" {{$rolename == 'interview supervisor' ? "selected='selected'" : ''}}>Interview Supervisor</option>
	                                    <option value="recruitment" {{$rolename == 'recruitment' ? "selected='selected'" : ''}}>Recruitment</option>
	                                    <option value="finance" {{$rolename == 'finance' ? "selected='selected'" : ''}}>Finance</option>
	                                    <option value="hr" {{$rolename == 'hr' ? "selected='selected'" : ''}}>HR</option>
	                                    <option value="sales" {{$rolename == 'sales' ? "selected='selected'" : ''}}>Sales</option>
	                                    <option value="operations" {{$rolename == 'operations' ? "selected='selected'" : ''}}>Operations</option>
	                                    <option value="customer service" {{$rolename == 'customer service' ? "selected='selected'" : ''}}>Customer Service</option>
	                                    <option value="Not Active" {{$rolename == 'Not Active' ? "selected='selected'" : ''}}>Not Active</option>
                                	</select> 

	                             	<?php $error = $errors->has('user_group') ? 'is-invalid' : ''; ?> 
	                                
	                            </div>
	                            <div class="d-flex w-100"></div>
	                            <div class="form-group col-md-12">
	                                <div class="row">                  
	                                   <div class="form-group col-md-12">
	                                       <button type="submit" class="btn btn-primary">Update</button>
	                                       <button type="submit" class="btn btn-danger">Cancel</button>
	                                   </div>
	                               </div>   
	                           </div>  
	                        </div>
	                    </div>
	                {{ Form::close() }}
                </div>
            </div>
        </div><!-- .animated -->
    </div> <!-- .content -->
</div><!-- /#right-panel -->
@endsection
@push('scripts')
	<script type="text/javascript">	
		$(document).ready(function() {
			$('.date').datepicker({  
				format: 'yyyy-mm-dd'
			}); 
		});
	</script>
@endpush
