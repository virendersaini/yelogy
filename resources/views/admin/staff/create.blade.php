@extends('admin.layout.app')

@push('title')

JH Staffs Management

@endpush

@push('breadcrumbs')
<li><a href="index.html">Home</a></li>
<li class="active">Add JH Staffs Management</li>
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
            	{{ Form::open(array('route' => 'staff.store', 'id' => 'add-staff','enctype'=>'multipart/form-data','autocomplete'=>'off'))}}  
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h4>Add New Staff Member</h4>
                    </div>
                                                             
                    <div class="card-body">
                        <div class="row">
                        	<div class="form-group col-md-1">   
                                <label class=" form-control-label">Title</label>
                                     <?php $option = usertitle(); ?>
                                    {!!Form::select('title',$option, null, ['class' => "form-control"])!!}

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif                                  
                            </div>

                            <div class="form-group col-md-5">
                                <label for="first_name" class=" form-control-label">First Name</label>
                                <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}" data-rule-required="true">
                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label class=" form-control-label">Last Name</label>
                                <input type="text" name="last_name" data-rule-required="true" value="{{ old('last_name') }}" class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}">
                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label class=" form-control-label">Address</label>
                                <input type="text" name="address" data-rule-required="true" value="{{ old('address') }}" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}">
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label class=" form-control-label">Address2</label>
                                <input type="text" name="address2" data-rule-required="true" value="{{ old('address2') }}" class="form-control {{ $errors->has('address2') ? ' is-invalid' : '' }}">
                                @if ($errors->has('address2'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('address2') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label class=" form-control-label">County</label>
                                <input type="text" name="county" data-rule-required="true" value="{{ old('county') }}" class="form-control {{ $errors->has('county') ? ' is-invalid' : '' }}">
                                @if ($errors->has('county'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('county') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-control-label">Postcode</label>
                                <input type="text" name="postcode" data-rule-required="true" value="{{ old('postcode') }}" class="form-control {{ $errors->has('postcode') ? ' is-invalid' : '' }}">
                                @if ($errors->has('postcode'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('postcode') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-control-label">Telephone</label>
                                <input type="text" name="phone_number" data-rule-required="true" data-mask="+00 (0) 0000 000000" data-mask-selectonfocus="true" placeholder="+44 (0) 7989 112337" value="{{ old('phone_number') }}" class="form-control {{ $errors->has('phone_number') ? ' is-invalid' : '' }}">
                                @if ($errors->has('phone_number'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label class=" form-control-label">Mobile</label>
                                <input type="text" name="mobile" data-rule-required="true" value="{{ old('mobile') }}" data-mask="+00 (0) 0000 000000" data-mask-selectonfocus="true" placeholder="+44 (0) 7989 112337" class="form-control {{ $errors->has('mobile') ? ' is-invalid' : '' }}">
                                @if ($errors->has('mobile'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-12">
                                <label class=" form-control-label">Email</label>
                                <input type="text" name="email" value="{{ old('email') }}" class="form-control email {{ $errors->has('email') ? ' is-invalid' : '' }}" data-rule-required="true" data-rule-email="true">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label class=" form-control-label">Date of Birth</label>
                                <input type="text" id="date" data-rule-required="true"
                                data-date-today-highlight="true" data-date-end-date="-18Y" data-date-autoclose="true" name="dob" value="{{ old('dob') }}" class="datepicker form-control {{ $errors->has('dob') ? ' is-invalid' : '' }}"> 
                                @if ($errors->has('dob'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-control-label">Age</label>
                                <input id="age" readonly="readonly" type="text" name="age" data-rule-required="true" value="{{ old('age') }}" class="form-control {{ $errors->has('city') ? ' is-invalid' : '' }}">
                                @if ($errors->has('age'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                                @endif
                            </div>
                            

                            <div class="form-group col-md-6">
                                <label class="form-control-label">Next of Kin</label>
                                <input type="text" name="next_of_kin" data-rule-required="true" value="{{ old('next_of_kin') }}" class="form-control {{ $errors->has('next_of_kin') ? ' is-invalid' : '' }}">
                                @if ($errors->has('next_of_kin'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('next_of_kin') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label class=" form-control-label">Relation for Next to Kin</label>
                                <input type="text" name="relation_next_of_kin" data-rule-required="true" value="{{ old('relation_next_of_kin') }}" class="form-control {{ $errors->has('relation_next_of_kin') ? ' is-invalid' : '' }}">
                                @if ($errors->has('relation_next_of_kin'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('relation_next_of_kin') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label class=" form-control-label">Do you hold a current UK driving licence?</label>
                                <select class="form-control {{ $errors->has('uk_driving_licence') ? ' is-invalid' : '' }}" name="uk_driving_licence" data-rule-required="true">
                                    <option value="yes">yes</option>
                                    <option value="no">No</option>
                                </select>
                                @if ($errors->has('uk_driving_licence'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('uk_driving_licence') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label class=" form-control-label">Do you own a car?</label>
                                <select class="form-control {{ $errors->has('own_car') ? ' is-invalid' : '' }}" name="own_car" data-rule-required="true">
                                    <option value="yes">yes</option>                                
                                    <option value="no">No</option>
                                </select>
                                @if ($errors->has('own_car'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('own_car') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label class=" form-control-label">Nationality</label>
                                <input type="text" name="nationality" data-rule-required="true" value="{{ old('nationality') }}" class="form-control {{ $errors->has('nationality') ? ' is-invalid' : '' }}">
                                @if ($errors->has('nationality'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nationality') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label class=" form-control-label">National Insurance Number</label>
                                <input type="text" name="national_insurance_number" data-rule-required="true" value="{{ old('national_insurance_number') }}" class="form-control {{ $errors->has('national_insurance_number') ? ' is-invalid' : '' }}">
                                @if ($errors->has('national_insurance_number'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('national_insurance_number') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label class=" form-control-label">Proof of Address</label>
                                <div class="row">
                                    <div class="col-sm-3 pr-0">                  
                                        <select class="form-control pre-select" name="proof_of_address">
                                        	<option value="Utility Bill">Utility Bill</option>
                                        	<option value="Bank Statement">Bank Statement</option>
                                        	<option value="Government Letter">Government Letter</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-9 pl-0">
                                        <input type="file" name="addpress_proof" class="form-control p-0">
                                    </div> 
                                </div>                                    
                            </div>
                            <div class="form-group col-md-6">
                                <label class=" form-control-label">Proof of Photo ID</label>
                                <div class="row">
                                    <div class="col-sm-3 pr-0">
                                        <select class="form-control pre-select" name="proof_of_photoid">
                                        	<option value="UK Driving Licence">UK Driving Licence</option>
                                        	<option value="Photo ID card">Photo ID card</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-9 pl-0">
                                        <input type="file" name="photo_id" class="form-control p-0">      
                                    </div> 
                                </div>                                    
                            </div>

                            <div class="form-group col-md-6">
                                <label class="form-control-label">Allergy/Phobia</label>
                                <select name="allergy[]" class="form-control selectpicker" multiple="multiple" data-rule-required="true">
                                    <option value="">Select Allergy</option>
                                    @foreach($allergies as $allergy)
                                    <option value="{{$allergy->name ?? ''}}">{{$allergy->name ?? ''}}</option>
                                    @endforeach

                                </select> 
                                @if ($errors->has('allergy'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('allergy') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label class=" form-control-label">User Group</label>
                                <select name="user_group[]" class="form-control selectpicker" multiple="multiple" data-rule-required="true">
                                	<option>Select Role</option>
                                    <option value="interview supervisor">Interview Supervisor</option>
                                    <option value="recruitment">Recruitment</option>
                                    <option value="finance">Finance</option>
                                    <option value="hr">HR</option>
                                    <option value="sales">Sales</option>
                                    <option value="operations">Operations</option>
                                    <option value="customer service">Customer Service</option>
                                    <option value="Not Active">Not Active</option>
                            	</select> 

                             	<?php $error = $errors->has('user_group') ? 'is-invalid' : ''; ?> 
                                
                            </div>	                            
                            
                            <div class="form-group col-md-6">
                                <label class=" form-control-label">Joining Date</label>
                                <input type="text" data-rule-required="true"
                                data-date-today-highlight="true" data-date-autoclose="true" name="joining_date" value="{{ old('joining_date') }}" class="datepicker form-control {{ $errors->has('joining_date') ? ' is-invalid' : '' }}"> 
                                @if ($errors->has('joining_date'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('joining_date') }}</strong>
                                    </span>
                                @endif
                            </div>	                            
                            
                            <div class="form-group col-md-6">
                                <label class=" form-control-label">DISC</label>
                                <select name="disc[]" class="form-control selectpicker" multiple="multiple" data-rule-required="true">
                                	<option>Select</option>
                                    @foreach($discs as $disc)
                                    <option value="{{$disc->name ?? ''}}">{{$disc->name ?? ''}}</option>
                                    @endforeach
                            	</select> 
                             	<?php $error = $errors->has('user_group') ? 'is-invalid' : ''; ?>         
                            </div>
                        </div>
                    </div>
	               
                </div>
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h4>Bank Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        	<div class="form-group col-md-6">
	                            <label class=" form-control-label">Name of the Bank</label>
                                <input type="text" name="bankName" data-rule-required="true" value="{{ old('bankName') }}" class="form-control {{ $errors->has('bankName') ? ' is-invalid' : '' }}">
                                @if ($errors->has('bankName'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('bankName') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label class=" form-control-label">Account Holder Name</label>
                                <input type="text" name="accountHolderName" data-rule-required="true" value="{{ old('accountHolderName') }}" class="form-control {{ $errors->has('accountHolderName') ? ' is-invalid' : '' }}">
                                @if ($errors->has('accountHolderName'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('accountHolderName') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
	                            <label class=" form-control-label">Account Number</label>
                                <input type="text" name="accountNumber" data-rule-number="true" data-msg-number="Please enter correct account number." value="{{ old('accountNumber') }}" class="form-control {{ $errors->has('accountNumber') ? ' is-invalid' : '' }}">
                                @if ($errors->has('accountNumber'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('accountNumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label class=" form-control-label">Sort Code</label>
                                <input type="text" name="sortCode" data-mask="SS-SS-SS" data-mask-selectonfocus="true" value="{{ old('sortCode') }}" class="form-control simple-field-data-mask-selectonfocus {{ $errors->has('sortCode') ? ' is-invalid' : '' }}" data-charset="_X_ X_X">
                                @if ($errors->has('sortCode'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('sortCode') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>
	                </div>
	                <div class="form-group col-md-12">
                       <button type="submit" class="btn btn-primary">Save</button>
                       <button type="submit" class="btn btn-danger">Cancel</button>
                   </div>
                </div>
                 {{ Form::close() }}
            </div>
        </div><!-- .animated -->
    </div> <!-- .content -->
</div><!-- /#right-panel -->

@endsection
@push('scripts')
	<script type="text/javascript">	
		$(document).ready(function() {

			$('#add-staff').validate();
		
            $("#date").datepicker({
                onSelect: function(dateText) {

                }
            }).on("change", function() {
                $('#age').val(GetAge(parseDate(this.value)));
            });            
            
		});
	</script>
@endpush
