@extends('admin.layout.app')

@push('title')

Helpers

@endpush

@push('breadcrumbs')
<li><a href="index.html">Home</a></li>
<li class="active"> Edit Helper</li>
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
                        <h4>Edit Helper</h4>
                    </div>
                    {{ Form::open(array('route' => array('just-helper.update',$user->id),'enctype'=>'multipart/form-data'))}}
                    {{ csrf_field() }}
    					<input type="hidden" name="_method" value="PUT">
	                    <div class="card-body">
	                        <div class="row">
                                <div class="form-group col-md-1">
                                    <label class=" form-control-label">Gender</label>
                                    <select name="gender" class="form-control" style="padding-right: 4px; padding-left: 4px;">
                                        <option value="male" {{$user->gender == 'male' ? 'selected="selected"' : '' }}>Male</option>
                                        <option value="female" {{$user->gender == 'female' ? 'selected="selected"' : '' }}>Female</option> 
                                    </select>                                   
                                </div>
                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">First Name</label>
                                    <input type="text" data-rule-required="true" class="form-control" name="first_name" value="{{old('first_name',$user->first_name)}}">
                                </div>
                                 <div class="form-group col-md-3">
                                    <label class="form-control-label">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" value="{{ old('last_name',$user->last_name) }}">
                                </div>
                                 <div class="form-group col-md-4">
                                    <label class="form-control-label">Nick Name</label>
                                    <input type="text" data-rule-required="true" class="form-control" name="nickname" value="{{ old('nickname',optional($user->helperdetails)->nickname) }}">
                                </div>
                                 <div class="form-group col-md-4">
                                    <label class=" form-control-label">Date of Birth</label>
                                    <div class="input-group date">
                                      <input class="form-control datepicker" type="text" name="dob" value="{{old('dob',beauty_date($user->helperdetails->dob,'d/m/Y')?? '' ) }}"/>
                                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                  </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Mobile Phone</label>
                                    <input type="text" data-mask="+00 (0) 0000 000000" data-mask-selectonfocus="true" placeholder="+44 (0) 7989 112337" class="form-control" name="phone_number" value="{{old('phone_number',$user->phone_number)}}"/>
                                </div>
                                 <div class="form-group col-md-4">
                                    <label class=" form-control-label">Alternate Phone</label>
                                    <input type="text" data-mask="+00 (0) 0000 000000" data-mask-selectonfocus="true" placeholder="+44 (0) 7989 112337" class="form-control" name="alternate_number" value="{{old('alternate_number',optional($user->helperdetails)->alternate_number)}}"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-control-label">Email</label>
                                    <input readonly="readonly" type="text" class="form-control" name="email" value="{{old('email',$user->email)}}"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Address 1</label>
                                    <input type="text" class="form-control" name="address" value="{{old('address',optional($user->helperdetails)->address)}}"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Address 2</label>
                                    <input type="text" class="form-control" name="address1" value="{{old('address1',optional($user->helperdetails)->address1)}}"/>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Area</label>
                                    <input type="text" class="form-control" name="area" value="{{old('area',optional($user->helperdetails)->area)}}"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">County</label>
                                    <input type="text" class="form-control" name="county" value="{{old('county',optional($user->helperdetails)->county)}}"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Postcode</label>
                                    <input type="text" class="form-control" name="invoice_postcode" value="{{old('invoice_postcode',optional($user->helperdetails)->invoice_postcode)}}"/>
                                </div>

                                <div class="form-group col-md-3">
                                    <label class=" form-control-label">Status</label>
                                    <select class="form-control" name="status">
                                        <option value="approved" {{optional($user->helperdetails)->status == 'enquiry' ? 'selected="selected"' : ''}}>Enquiry</option>
                                    	<option value="approved" {{optional($user->helperdetails)->status == 'approved' ? 'selected="selected"' : ''}}>Approved</option>
                                    	<option value="cleaning interview" {{optional($user->helperdetails)->status == 'contract' ? 'selected="selected"' : ''}}>Contract</option>
                                    	<option value="cleaning interview" {{optional($user->helperdetails)->status == 'cleaning interview' ? 'selected="selected"' : ''}}>Cleaning Interview</option>
                                    	<option value="face to face interview" {{optional($user->helperdetails)->status == 'verified documents' ? 'selected="selected"' : ''}}>Verified Documents</option>
                                        <option value="face to face interview" {{optional($user->helperdetails)->status == 'face to face interview' ? 'selected="selected"' : ''}}>Face to Face Interview</option>
                                        <option value="unapproved" {{optional($user->helperdetails)->status == 'unapproved' ? 'selected="selected"' : ''}}>Unapproved</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class=" form-control-label">Nationality</label>
                                    <input type="text" name="nationality" value="{{old('nationality',optional($user->helperdetails)->nationality)}}" class="form-control">
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
                                      <input class="form-control datepicker" name="interview_date" value="{{old('interview_date',beauty_date(optional($user->helperdetails)->interview_date,'d/m/Y'))}}" type="text"  />
                                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                  </div>
                                </div>
                   
                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Cleaning Rating</label>
                                    <select name="cleaning_rating" class="form-control">
                                    	@for($i=1;$i<=5;$i++)
                                    	<option value="{{$i}}" {{optional($user->helperdetails)->cleaning_rating == $i ? 'selected="selected"' : ''}}>{{$i}}</option>
                                    	@endfor
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">English Level</label>
                                    <select name="english_level" class="form-control">
                                        @for($i=1;$i<=5;$i++)
                                    	<option value="{{$i}}" {{optional($user->helperdetails)->english_level == $i ? 'selected="selected"' : ''}}>{{$i}}</option>
                                    	@endfor
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Other Languages</label>
                                    <input type="text" name="other_language" value="{{old('other_language',optional($user->helperdetails)->other_language)}}" class="form-control">
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Start Date</label>
                                    <div class="input-group date">
                                      <input class="form-control datepicker" name="start_date" value="{{old('start_date',beauty_date(optional($user->helperdetails)->start_date,'d/m/Y'))}}" type="text"  />
                                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                  </div>
                                </div> 

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">End Date</label>
                                    <div class="input-group date">
                                      <input class="form-control datepicker" type="text" name="end_date" value="{{old('end_date',beauty_date(optional($user->helperdetails)->end_date,'d/m/Y'))}}"  />
                                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                  </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label class=" form-control-label">Days Available</label>
                                     <input type="text" name="days_available" value="{{old('days_available',optional($user->helperdetails)->days_available)}}" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class=" form-control-label">Area Preference</label>
                                     <input type="text" name="area_preference" value="{{old('area_preference',optional($user->helperdetails)->area_preference)}}" class="form-control">
                                </div>

                                <!-- <div class="form-group col-md-2">
                                    <label class=" form-control-label">Allergies / Phobia</label>  
                                    <input data-toggle="modal" data-target="#allergies" type="text" placeholder="Tags" class="form-control">
                                   
                                </div>-->

                                <div class="form-group  col-md-12">
                                    <h4>Vetting</h4>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">UTR Number</label> 
                                    <input type="text" name="UTR_number" value="{{ old('UTR_number',optional($user->helpervettings)->UTR_number)}}" class="form-control">
                                </div> 
                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">NI Number</label> 
                                    <input type="text" name="NI_number" value="{{ old('NI_number',optional($user->helpervettings)->NI_number)}}" class="form-control">
                                </div> 
                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Right to work</label> 
                                    <select name="right_to_work" class="form-control">
                                        <option {{optional($user->helpervettings)->right_to_work == 'yes' ? 'selected="selected"' : '' }}>Yes</option>
                                        <option {{optional($user->helpervettings)->right_to_work == 'no' ? 'selected="selected"' : '' }}>No</option>
                                    </select>
                                </div> 

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Visa</label> 
                                    
                                    <div class="row">
                                        <div class="col-sm-3 pr-0">
                                        <select name="visa" class="form-control pre-select">
                                            <option {{optional($user->helpervettings)->visa == 'no' ? 'selected="selected"' : '' }}>No</option>
                                            <option {{optional($user->helpervettings)->visa == 'yes' ? 'selected="selected"' : '' }}>Yes</option>
                                        </select> 
                                        </div>
                                        <div class="col-sm-9 pl-0">
                                          <div class="input-group date">
                                      <input name="visa_date" class="form-control datepicker" type="text" value="{{old('visa_date',beauty_date(optional($user->helpervettings)->visa_date,'d/m/Y'))}}"  />
                                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                  </div>
                                        </div> 
                                    </div>
                                  
                                </div>  

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Photo ID</label> 
                                    @if(!empty($user->fetchFirstMediaUrl('helper_photo')))
                                        <div class="img-responsive">
                                            <img src="{{ $user->fetchFirstMediaUrl('helper_photo') }}">
                                        </div>
                                    @endif
                                    <div class="custom-file">
                                        <input type="file" name="photo_id" class="form-control p-0">
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Proof of Address</label> 
                                    @if(!empty($user->fetchFirstMediaUrl('helper_address_proof')))
                                        <div class="img-responsive">
                                            <img src="{{ $user->fetchFirstMediaUrl('helper_address_proof') }}">
                                        </div>
                                    @endif
                                    <div class="custom-file">
                                        <input type="file" class="form-control p-0" name="address_proof">
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">CRB / DBS</label> 
                                    <div class="input-group date">
                                      <input class="form-control" type="text" name="crb" value="{{old('crb',beauty_date(optional($user->helpervettings)->crb,'d/m/Y'))}}" />
                                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                  </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Insurance</label> 
                                    <input type="text" placeholder="Company" name="insurance" value="{{old('insurance',optional($user->helpervettings)->insurance)}}" class="form-control">
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Policy No</label> 
                                    <input type="text" placeholder="" class="form-control" name="policy_no" value="{{old('policy_no',optional($user->helpervettings)->policy_no)}}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Upload Policy</label> 
                                    @if(!empty($user->fetchFirstMediaUrl('helper_upload_policy')))
                                        <div class="img-responsive">
                                            <img src="{{ $user->fetchFirstMediaUrl('helper_upload_policy') }}">
                                        </div>
                                    @endif
                                    <input type="file" placeholder="Company" class="form-control" name="upload_policy" value="">
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Expiry Date</label> 
                                    <div class="input-group date">
                                      <input class="form-control datepicker" type="text" name="policy_expiry_date" value="{{old('policy_expiry_date',beauty_date(optional($user->helpervettings)->policy_expiry_date,'d/m/Y'))}}" />
                                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                  </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">UK Reference Name1 </label> 
                                    <input type="text" placeholder="" class="form-control" name="UK_reference_name1" value="{{old('UK_reference_name1',optional($user->helpervettings)->UK_reference_name1)}}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">UK Reference Name2</label> 
                                    <input type="text" placeholder="" class="form-control" name="UK_reference_name2" value="{{old('UK_reference_name2',optional($user->helpervettings)->UK_reference_name2)}}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Phone Ref 1</label> 
                                    <input type="text" data-mask="+00 (0) 0000 000000" data-mask-selectonfocus="true" placeholder="+44 (0) 7989 112337" placeholder="" class="form-control" name="phone_ref1" value="{{old('phone_ref1',optional($user->helpervettings)->phone_ref1)}}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Phone Ref 2</label> 
                                    <input type="text" data-mask="+00 (0) 0000 000000" data-mask-selectonfocus="true" placeholder="+44 (0) 7989 112337" placeholder="" class="form-control" name="phone_ref2" value="{{old('phone_ref2',optional($user->helpervettings)->phone_ref2)}}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Email Ref 1</label> 
                                    <input type="text" data-rule-email="true" placeholder="" class="form-control" name="email_ref1" value="{{old('email_ref1',optional($user->helpervettings)->email_ref1)}}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Email Ref 2</label> 
                                    <input type="text" data-rule-email="true" placeholder="" class="form-control" name="email_ref2" value="{{old('email_ref2',optional($user->helpervettings)->email_ref2)}}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Ref 1 Contacted</label> 
                                    <input type="text" placeholder="" class="form-control" name="ref1_contacted" value="{{old('ref1_contacted',optional($user->helpervettings)->ref1_contacted)}}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Ref 2 Contacted</label> 
                                    <input type="text" placeholder="" class="form-control" name="ref2_contacted" value="{{old('ref2_contacted',optional($user->helpervettings)->ref2_contacted)}}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Reference1</label> 
                                    @if(!empty($user->fetchFirstMediaUrl('helper_reference1')))
                                        <div class="img-responsive">
                                            <img src="{{ $user->fetchFirstMediaUrl('helper_reference1') }}">
                                        </div>
                                    @endif
                                    <input type="file" name="reference1" class="form-control">
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" form-control-label">Reference2</label>
                                    @if(!empty($user->fetchFirstMediaUrl('helper_reference2')))
                                        <div class="img-responsive">
                                            <img src="{{ $user->fetchFirstMediaUrl('helper_reference2') }}">
                                        </div>
                                    @endif 
                                    <input type="file" name="reference2" class="form-control">
                                </div>
                            
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Save and Next</button>
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
			 
		});
	</script>
@endpush
