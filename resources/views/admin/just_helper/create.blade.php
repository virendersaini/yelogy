@extends('admin.layout.app')

@push('title')

Helpers

@endpush

@push('breadcrumbs')
<li><a href="index.html">Home</a></li>
<li class="active"> Add Helper</li>
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
                <div class="dropdown pull-left">                    
                   
                </div>
                <div class="pull-right d-flex">
                                                   
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h4>Add Helper</h4>
                    </div>
                    {{ Form::open(array('route' => 'just-helper.store','enctype'=>'multipart/form-data','autocomplete'=>'off','id'=>'add-helper'))}}                                           
	                    <div class="card-body">
	                        <div class="row">
                                <input type="hidden" name="type" value="{{$category ?? ''}}">
                                <div class="form-group col-md-1">
                                    <label class=" form-control-label">Gender</label>
                                    <select name="gender" class="form-control" style="padding-right: 4px; padding-left: 4px;">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option> 
                                    </select>                                   
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-control-label">First Name</label>
                                    <input type="text" data-rule-required="true" class="form-control" name="first_name" value="{{old('first_name')}}">
                                </div>
                                 <div class="form-group col-md-3">
                                    <label class=" form-control-label">Last Name</label>
                                    <input type="text" data-rule-required="true" class="form-control" name="last_name" value="{{old('last_name')}}">
                                </div>
                                 <div class="form-group col-md-4">
                                    <label class=" form-control-label">Nick Name</label>
                                    <input type="text" data-rule-required="true" class="form-control" name="nickname" value="{{old('nickname')}}">
                                </div>
                                 <div class="form-group col-md-4">
                                    <label class=" form-control-label">Date of Birth</label>
                                    <div class="input-group">
                                      <input class="form-control datepicker" type="text" name="dob" data-date-end-date="-18Y" value="{{old('dob')}}"/>
                                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                  </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Phone Number</label>
                                    <input type="text" data-mask="+00 (0) 0000 000000" data-mask-selectonfocus="true" placeholder="+44 (0) 7989 112337" class="form-control" name="phone_number" value="{{old('phone_number')}}"/>
                                </div>
                                 <div class="form-group col-md-4">
                                    <label class=" form-control-label">Alternate Phone</label>
                                    <input type="text" data-mask="+00 (0) 0000 000000" data-mask-selectonfocus="true" placeholder="+44 (0) 7989 112337" class="form-control" name="alternate_number" value="{{old('alternate_number')}}"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Email</label>
                                    <input type="text" class="form-control" name="email" value="{{old('email')}}" data-rule-required="true" data-rule-email="true"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Address 1</label>
                                    <input type="text" class="form-control" name="address" value="{{old('address')}}"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Address 2</label>
                                    <input type="text" class="form-control" name="address1" value="{{old('address1')}}"/>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Area</label>
                                    <input type="text" class="form-control" name="area" value="{{old('area')}}"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">County</label>
                                    <input type="text" class="form-control" name="county" value="{{old('county')}}"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Postcode</label>
                                    <input type="text" class="form-control" name="invoice_postcode" value="{{old('invoice_postcode')}}"/>
                                </div>

                                <div class="form-group col-md-3">
                                    <label class=" form-control-label">Status</label>
                                    <select class="form-control" name="status">

                                        <option value="enquiry">Enquiry</option>
                                    	<option value="approved">Approved</option>
                                        <option value="contract">Contract</option>  	
                                    	<option value="cleaning interview">Cleaning Interview</option>
                                        <option value="verified documents">Verified Documents</option>
                                    	<option value="face to face interview">Face to Face Interview</option>

                                        <option value="unapproved">Unapproved</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class=" form-control-label">Nationality</label>
                                    <input type="text" name="nationality" value="{{old('nationality')}}" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class=" form-control-label">Marketing</label>
                                    <select name="marketing" class="form-control selectpicker">
                                        @foreach($marketings as $market)
                                        <option value="{{$market->name ?? ''}}">{{$market->name ?? ''}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Interview Date</label>
                                    <div class="input-group date">
                                      <input class="form-control datepicker" name="interview_date" value="{{old('interview_date')}}" type="text"  />
                                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                  </div>
                                </div>
                   
                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Cleaning Rating</label>
                                    <select name="cleaning_rating" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">English Level</label>
                                    <select name="english_level" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Other Languages</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="other_language" value="{{old('other_language')}}">
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Start Date</label>
                                    <div class="input-group date">
                                      <input class="form-control datepicker" name="start_date" value="{{old('start_date')}}" type="text"  />
                                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                  </div>
                                </div> 

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">End Date</label>
                                    <div class="input-group date">
                                      <input class="form-control datepicker" type="text" name="end_date" value="{{old('end_date')}}"  />
                                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                  </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label class=" form-control-label">Days Available</label>
                                     <input type="text" name="days_available" value="{{old('days_available')}}" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class=" form-control-label">Area Preference</label>
                                     <input type="text" name="area_preference" value="{{old('area_preference')}}" class="form-control">
                                </div>

                                <!-- <div class="form-group col-md-2">
                                    <label class=" form-control-label">Allergies / Phobia</label>  
                                    <input data-toggle="modal" data-target="#allergies" type="text" placeholder="Tags" class="form-control">
                                   
                                </div>  -->

                                <div class="form-group  col-md-12">
                                    <h4>Vetting</h4>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">UTR Number</label> 
                                    <input type="text" name="UTR_number" value="{{ old('UTR_number') }}" class="form-control">
                                </div> 
                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">NI Number</label> 
                                    <input type="text" name="NI_number" value="{{ old('NI_number') }}" class="form-control">
                                </div> 
                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Right to work</label> 
                                    <select name="right_to_work" class="form-control">
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div> 

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Visa</label> 
                                    
                                    <div class="row">
                                        <div class="col-sm-3 pr-0">
                                        <select name="visa" class="form-control pre-select">
                                            <option>No</option>
                                            <option>Yes</option>
                                        </select> 
                                        </div>
                                        <div class="col-sm-9 pl-0">
                                          <div class="input-group date">
                                      <input name="visa_date" class="form-control datepicker" type="text" value="{{old('visa_date')}}"  />
                                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                  </div>
                                        </div> 
                                    </div>
                                  
                                </div>  

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Photo ID</label> 
                                    <input type="file" name="photo_id" class="form-control p-0">
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Proof of Address</label> 
                                    <input type="file" class="form-control p-0" name="address_proof">
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">CRB / DBS</label> 
                                    <div class="input-group date">
                                      <input class="form-control datepicker" type="text" name="crb" value="{{old('crb')}}" />
                                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                  </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Insurance</label> 
                                    <input type="text" placeholder="Company" name="insurance" value="{{old('insurance')}}" class="form-control">
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Policy No</label> 
                                    <input type="text" placeholder="" class="form-control" name="policy_no" value="{{old('policy_no')}}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Upload Policy</label> 
                                    <input type="file" placeholder="Company" class="form-control" name="upload_policy" value="{{old('policy_no')}}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Expiry Date</label> 
                                    <div class="input-group date">
                                      <input class="form-control datepicker" type="text" name="policy_expiry_date" value="{{old('policy_expiry_date')}}" />
                                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                  </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">UK Reference Name1 </label> 
                                    <input type="text" placeholder="" class="form-control" name="UK_reference_name1" value="{{old('UK_reference_name1')}}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">UK Reference Name2</label> 
                                    <input type="text" placeholder="" class="form-control" name="UK_reference_name2" value="{{old('UK_reference_name2')}}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Phone Ref 1</label> 
                                    <input type="text" data-mask="+00 (0) 0000 000000" data-mask-selectonfocus="true" placeholder="+44 (0) 7989 112337" placeholder="" class="form-control" name="phone_ref1" value="{{old('phone_ref1')}}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Phone Ref 2</label> 
                                    <input type="text" data-mask="+00 (0) 0000 000000" data-mask-selectonfocus="true" placeholder="+44 (0) 7989 112337" placeholder="" class="form-control" name="phone_ref2" value="{{old('phone_ref2')}}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Email Ref 1</label> 
                                    <input type="text" data-rule-email="true" placeholder="" class="form-control" name="email_ref1" value="{{old('email_ref1')}}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Email Ref 2</label> 
                                    <input type="text" data-rule-email="true" placeholder="" class="form-control" name="email_ref2" value="{{old('email_ref2')}}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Ref 1 Contacted</label> 
                                    <input type="text" placeholder="" class="form-control" name="ref1_contacted" value="{{old('ref1_contacted')}}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Ref 2 Contacted</label> 
                                    <input type="text" placeholder="" class="form-control" name="ref2_contacted" value="{{old('ref2_contacted')}}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Reference1</label> 
                                    <input type="file" name="reference1" class="form-control">
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Reference2</label> 
                                    <input type="file" name="reference2" class="form-control">
                                </div>
                            
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Save</button>
                                    <button type="reset" class="btn btn-danger">Cancel</button>
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
			$('#add-helper').validate();
		});
	</script>
@endpush
