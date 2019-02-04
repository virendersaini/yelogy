@extends('admin.layout.app')

@push('title')

JH Staffs Team Management

@endpush

@push('breadcrumbs')
    <li><a href="{{url('/admin')}}">Home</a></li>
    <li class="active">JH Staffs Team Management</li>
@endpush
    
@section('content')
    
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
               <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Staff: {{ucfirst($user->name) ?? ''}}</h4>
                        </div>
                        <div class="card-body">
                            <div class="default-tab">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-contact-tab" data-toggle="tab" href="#CustomerInformation" role="tab" aria-controls="nav-home" aria-selected="true">Staff Information</a>

                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#StaffBankDetails" role="tab" aria-controls="nav-profile" aria-selected="false">Bank Details</a>     
                                    </div>
                                </nav>
                                <div class="tab-content pt-2" id="nav-contact-tab">
                                    <div class="tab-pane fade show active" id="CustomerInformation" role="tabpanel" aria-labelledby="nav-contact-tab">
                                        <div class="card">
                                            <div class="card-header d-flex  justify-content-between ">
                                                <h4 class="align-self-center">Basic Details </h4>
                                                <a href="{{route('staff.edit',$user->id)}}" class="btn btn-primary pull-right" class="pull-right">Edit</a>
                                            </div> 
                                            <div class="card-body view-data-form">
                                                <div class="form-group d-flex">
                                                 <label>User Group</label>
                                                  {{ ucfirst(implode(', ', $user->getRoleNames()->toArray())) }}
                                                </div>  
                                                <div class="form-group d-flex">
                                                 <label>Name</label>
                                                  {{$user->name ?? ''}}
                                                </div> 
                                                <div class="form-group d-flex">
                                                 <label>Address</label>
                                                  {{$user->staffDetails->address ?? ''}}
                                                </div> 

                                                <div class="form-group d-flex">
                                                 <label>Address2</label>
                                                  {{$user->staffDetails->address2 ?? ''}}
                                                </div>  

                                                <div class="form-group d-flex">
                                                 <label>County</label>
                                                  {{$user->staffDetails->county ?? ''}}
                                                </div>  

                                                <div class="form-group d-flex">
                                                 <label>Postcode</label>
                                                  {{$user->staffDetails->postcode ?? ''}}
                                                </div>

                                                <div class="form-group d-flex">
                                                 <label>Telephone</label>
                                                  {{$user->phone_number ?? ''}}
                                                </div>

                                                <div class="form-group d-flex">
                                                 <label>Mobile</label>
                                                  {{$user->staffDetails->mobile ?? ''}}
                                                </div>

                                                <div class="form-group d-flex">
                                                 <label>Email</label>
                                                  {{$user->email ?? ''}}
                                                </div> 

                                                <div class="form-group d-flex">
                                                 <label>Date of Birth</label>
                                                 {{ beauty_date($user->staffdetails->dob,'d/m/Y') }}
                                                </div> 
                                                <div class="form-group d-flex">
                                                 <label>Age</label>
                                                  {{$user->staffDetails->age ?? ''}}
                                                </div> 
                                                
                                                <div class="form-group d-flex">
                                                 <label>Joining Date</label>
                                                 {{ beauty_date($user->staffdetails->joining_date,'d/m/Y') }}
                                                </div>  
                                                                                        
                                             </div>                                                  
                                        </div>

                                        <div class="card">
                                            <div class="card-header">
                                               <h5>Other Information</h5>
                                            </div> 
                                            <div class="card-body view-data-form">
                                                 <div class="form-group d-flex">
                                                 <label>Do you hold a current UK driving licence?</label>
                                                  {{$user->staffDetails->uk_driving_licence ?? ''}}
                                                </div> 
                                                <div class="form-group d-flex">
                                                 <label>Do you own a car?</label>
                                                  {{$user->staffDetails->own_car ?? ''}}
                                                </div>  
                                                <div class="form-group d-flex">
                                                 <label>Nationality</label>
                                                  {{$user->staffDetails->nationality ?? ''}}
                                                </div>  
                                                <div class="form-group d-flex">
                                                 <label>National Insurance Number</label>
                                                  {{$user->staffDetails->national_insurance_number ?? ''}}
                                                </div>  
                                                <div class="form-group d-flex">
                                                 <label>Proof of Address</label>
                                                  {{$user->staffDetails->proof_of_address ?? ''}}
                                                </br>
                                                    @if(!empty($user->fetchFirstMediaUrl('staff_address_proof')))
                                                    <div class="img-responsive">
                                                        <img width="200" src="{{ $user->fetchFirstMediaUrl('staff_address_proof') }}">
                                                    </div>
                                                    @endif
                                                </div>  
                                                <div class="form-group d-flex">
                                                 <label>Proof of Photo ID</label>
                                                  {{$user->staffDetails->proof_of_photoid ?? ''}}
                                                  </br>
                                                    @if(!empty($user->fetchFirstMediaUrl('staff_address_proof')))
                                                    <div class="img-responsive">
                                                        <img width="200" src="{{ $user->fetchFirstMediaUrl('staff_photo_id') }}">
                                                    </div>
                                                    @endif
                                                </div>  
                                                <div class="form-group d-flex">
                                                 <label>Allergy/Phobia</label>
                                                 @php
                                                 $allergy = json_decode($user->staffDetails->allergy ?? '');
                                                 $disc = json_decode($user->staffDetails->disc ?? '');
                                                 @endphp
                                                 {{ implode(",", $allergy) }}
                                                </div> 
                                                <div class="form-group d-flex">
                                                 <label>DISC</label>
                                                  {{ implode(",", $disc) }}
                                                </div> 
                                            
                                            </div> 
                                        </div>

                                       

                                        <div class="card">
                                            <div class="card-header">
                                               <h5>Next of Kin Information</h5>
                                            </div> 
                                            <div class="card-body view-data-form">
                                                 <div class="form-group d-flex">
                                                 <label>Next of Kin</label>
                                                  {{$user->staffDetails->next_of_kin ?? ''}}
                                                </div> 
                                                <div class="form-group d-flex">
                                                 <label>Relation for Next to Kin</label>
                                                  {{$user->staffDetails->relation_next_of_kin ?? ''}}
                                                </div>                                                   
                                            </div> 
                                        </div>                             
                                    </div>
                                    <div class="tab-pane fade" id="StaffBankDetails" role="tabpanel" aria-labelledby="nav-contact-tab">
                                        <div class="card">                            
                                            <div class="card-header d-flex  justify-content-between ">
                                                <h4 class="align-self-center">Bank Details</h4>
                                                <a href="{{route('staff.edit',$user->id)}}" class="btn btn-primary pull-right" class="pull-right">Edit</a>
                                            </div> 
                                            <div class="card-body view-data-form">
                                                 <div class="form-group d-flex">
                                                     <label>Name of the Bank</label>
                                                      {{$user->staffDetails->bankName ?? ''}}
                                                 </div> 
                                                  <div class="form-group d-flex">
                                                     <label>Account Holder Name</label>
                                                      {{$user->staffDetails->accountHolderName ?? ''}}
                                                 </div> 
                                                 <div class="form-group d-flex">
                                                     <label>Account Number</label>
                                                      {{$user->staffDetails->accountNumber ?? ''}}
                                                 </div> 
                                                  <div class="form-group d-flex">
                                                     <label>Sort Code</label>
                                                      {{$user->staffDetails->sortCode ?? ''}}
                                                 </div> 
                                            </div>
                                        </div>
                                    </div>                                          
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div> <!-- .content -->

@endsection

@push('scripts')

<script type="text/javascript">
    $('.alert').fadeOut(4000);
</script>

@endpush