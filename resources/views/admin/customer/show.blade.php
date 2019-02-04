@extends('admin.layout.app')

@push('title')

JH Customer Management

@endpush

@push('breadcrumbs')
    <li><a href="{{url('/admin')}}">Home</a></li>
    <li>JH Customer </li>
    <li class="active">Show </li>
@endpush
    
@section('content')
    
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
               <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Customer: {{$user->name ?? ''}}</h4>
                        </div>
                        <div class="card-body">
                            <div class="default-tab">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-contact-tab" data-toggle="tab" href="#CustomerInformation" role="tab" aria-controls="nav-home" aria-selected="true">Helper Information</a>

                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#CustomerScheduling" role="tab" aria-controls="nav-profile" aria-selected="false">Helper Scheduling</a>

                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#CustomerCleanDiary" role="tab" aria-controls="job-renewal" aria-selected="false">Helper Clean Diary</a>
                                                                                      
                                    </div>
                                </nav>
                                <div class="tab-content pt-2" id="nav-contact-tab">
                                    <div class="tab-pane fade show active" id="CustomerInformation" role="tabpanel" aria-labelledby="nav-contact-tab">
                                        <div class="card">
                                            <div class="card-header d-flex  justify-content-between ">
                                                <h4 class="align-self-center">Helper Information </h4>
                                                <a href="{{ route('just-helper.edit',$user->id)}}" class="btn btn-primary pull-right" class="pull-right">Edit</a>
                                            </div> 
                                             <div class="card-body view-data-form">
                                                 <div class="form-group d-flex">
                                                     <label>Role</label>
                                                      Helper
                                                 </div>   
                                                                                        
                                             </div>                                                  
                                        </div>

                                        <div class="card">
                                            <div class="card-header">
                                               <h5>Vetting Information</h5>
                                            </div> 
                                            <div class="card-body view-data-form">
                                                 <div class="form-group d-flex">
                                                     <label>UTR Number</label>
                                                     --
                                                 </div>

                                                 
                                            
                                            </div> 
                                        </div>                                      

                                                                   
                                    </div>
                                    <div class="tab-pane fade" id="CustomerScheduling" role="tabpanel" aria-labelledby="nav-contact-tab">
                                        <div class="card">                            
                                            <div class="card-header d-flex  justify-content-between ">
                                                <h4 class="align-self-center">Helper Scheduling</h4>
                                                <a href="#" class="btn btn-primary pull-right" class="pull-right">Add New Scheduling</a>
                                            </div> 
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                  <table style="width: 2200px;" id="bootstrap-data-table" class="table table-striped table-bordered custom-tabledata">
                                                    <thead>
                                                      <tr>
                                                        <th width="10">S.No.</th>
                                                        <th>Created Date</th>
                                                        <th>
                                                            <select class="form-control table-selects">
                                                                <option>Frequency</option>
                                                                <option>Fortnighty</option>
                                                                <option>Weekly</option>
                                                                <option>Daily</option>
                                                            </select>
                                                        </th>                                                      
                                                        <th>Customer Name</th>
                                                        <th>Scheduled Date</th>
                                                        <th>Scheduled Start Time</th>
                                                        <th>Scheduled End Time</th>
                                                        <th>Actual Start Time</th>
                                                        <th>Actual End Time</th>
                                                        <th>Scheduled Hours</th>
                                                        <th>Hourly Rate</th>
                                                        <th>brief Notes</th>                                
                                                        <th>Plan</th>
                                                        <th>
                                                            <select class="form-control table-selects">
                                                                <option>Status</option>
                                                                <option>Sent</option>
                                                                <option>Hold</option>
                                                                <option>Open</option>
                                                                <option>Completed</option>
                                                                <option>Canceled</option>
                                                            </select>
                                                        </th>
                                                        <th width="10" class="alert_column_delete">Action</th> 
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      <tr>
                                                        <td width="10">1</td>
                                                        <td>20/10/2019</td>
                                                        <td>Weekly</td>
                                                        <td>John Smith</td>
                                                        <td>21/10/2019</td>
                                                        <td>09:00 am</td>
                                                        <td>12:00 pm</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>3</td>                                            
                                                        <td>£18</td>
                                                        <td>Sample text here</td>
                                                        <td>Gold-Zone 2-6</td>                                 
                                                        <td class="text-success">Sent</td>
                                                        <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
                                                      </tr> 

                                                     <tr>
                                                        <td width="10">2</td>
                                                        <td>20/10/2019</td>
                                                        <td>Weekly</td>
                                                        <td>John Smith</td>
                                                        <td>21/10/2019</td>
                                                        <td>09:00 am</td>
                                                        <td>12:00 pm</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>3</td>                                            
                                                        <td>£18</td>
                                                        <td>Sample text here</td>
                                                        <td>Gold-Zone 2-6</td>                                 
                                                        <td class="text-success">Sent</td>
                                                        <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
                                                      </tr> 

                                                      <tr>
                                                        <td width="10">3</td>
                                                        <td>20/10/2019</td>
                                                        <td>Weekly</td>
                                                        <td>John Smith</td>
                                                        <td>21/10/2019</td>
                                                        <td>09:00 am</td>
                                                        <td>12:00 pm</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>3</td>                                            
                                                        <td>£18</td>
                                                        <td>Sample text here</td>
                                                        <td>Gold-Zone 2-6</td>                                 
                                                        <td class="text-success">Sent</td>
                                                        <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
                                                      </tr>  

                                                      <tr>
                                                        <td width="10">4</td>
                                                        <td>20/10/2018</td>
                                                        <td>Weekly</td>
                                                        <td>John Smith</td>
                                                        <td>21/10/2018</td>
                                                        <td>09:00 am</td>
                                                        <td>12:00 pm</td>
                                                        <td>09:30 am</td>
                                                        <td>12:30 pm</td>
                                                        <td>3</td>                                            
                                                        <td>£18</td>
                                                        <td>Sample text here</td>
                                                        <td>Gold-Zone 2-6</td>                                 
                                                        <td class="text-success">Completed</td>
                                                        <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
                                                      </tr> 

                                                      <tr>
                                                        <td width="10">5</td>
                                                        <td>20/10/2018</td>
                                                        <td>Weekly</td>
                                                        <td>John Smith</td>
                                                        <td>21/10/2018</td>
                                                        <td>09:00 am</td>
                                                        <td>12:00 pm</td>
                                                        <td>09:30 am</td>
                                                        <td>12:30 pm</td>
                                                        <td>3</td>                                            
                                                        <td>£18</td>
                                                        <td>Sample text here</td>
                                                        <td>Gold-Zone 2-6</td>                                 
                                                        <td class="text-success">Completed</td>
                                                        <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
                                                      </tr>      
                                                    </tbody>
                                                  </table>
                                                  </div>
                                            </div>
                                        </div>
                                    </div>
               
                                    <div class="tab-pane fade" id="CustomerCleanDiary" role="tabpanel" aria-labelledby="nav-contact-tab">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered" style="min-width: 2000px;">
                                                <thead>
                                                    <tr>
                                                        <th width="10">S.No.</th>
                                                        <th>Date</th>
                                                        <th>Day</th>                                               
                                                        <th>Helper</th>
                                                        <th>Location/ Postcode</th>        
                                                        <th>Start Time</th>
                                                        <th>Finish Time</th>
                                                        <th>Start GPS Longitude</th>
                                                        <th>End GPS Longitude</th>
                                                        <th>Start GPS Latitude</th>
                                                        <th>End GPS Latitude</th>
                                                        <th>Total Hrs</th>
                                                        <th>Helper Rate P/H</th>
                                                        <th>Helper Charge</th>
                                                        <th>Time Change</th>
                                                        <th>Status</th>
                                                        <th>Brief Notes</th>
                                                        <th>Initials</th>                                       
                                                        <th width="70" class="alert_column_delete">Action</th> 
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>    
                                                        <td>1</td>                                   
                                                        <td>12/07/2018</td>
                                                        <td>Monday</td>                                        
                                                        <td>Nadia</td>
                                                        <td>002203</td>
                                                        <td>9:00</td>                                 
                                                        <td>12:00</td>
                                                        <td>23.5</td>
                                                        <td>40.7</td>
                                                        <td>33.5</td>
                                                        <td>50.7</td>

                                                        <td>150</td>
                                                        <td>$15</td>
                                                        <td>$3</td>
                                                        <td>.15</td>   
                                                        <td class="danger">open</td>
                                                        <td>lorem lipsom text</td>
                                                        <td>23</td>
                                                        <td class="action-btns">   
                                                            <a href="customer-clean-diary-edit.html" class="text-info" title="Create"><i class="fa fa-edit"></i></a> 
                                                            <a href="#" class="text-danger delete-alert" title="Delete"><i class="fa fa-trash"></i></a> 
                                                        </td> 
                                                    </tr> 
                                                    <tr>    
                                                        <td>2</td>                                   
                                                        <td>12/07/2018</td>
                                                        <td>Monday</td>                                        
                                                        <td>Nadia</td>
                                                        <td>002203</td>
                                                        <td>9:00</td>                                 
                                                        <td>12:00</td>
                                                        <td>23.5</td>
                                                        <td>40.7</td>
                                                        <td>33.5</td>
                                                        <td>50.7</td>
                                                        <td>150</td>
                                                        <td>$15</td>
                                                        <td>$3</td>
                                                        <td>.15</td>   
                                                        <td class="danger">open</td>
                                                        <td>lorem lipsom text</td>
                                                        <td>23</td>                            
                                                        <td class="action-btns">   
                                                            <a href="customer-clean-diary-edit.html" class="text-info" title="Create"><i class="fa fa-edit"></i></a> 
                                                            <a href="#" class="text-danger delete-alert" title="Delete"><i class="fa fa-trash"></i></a> 
                                                        </td> 
                                                    </tr> 
                                                    <tr>    
                                                        <td>3</td>                                   
                                                        <td>12/07/2018</td>
                                                        <td>Tuesday</td>                                        
                                                        <td>Shadia</td>
                                                        <td>002203</td>
                                                        <td>10:00</td>                                 
                                                        <td>12:00</td>
                                                        <td>23.5</td>
                                                        <td>40.7</td>
                                                        <td>33.5</td>
                                                        <td>50.7</td>
                                                        <td>220</td>
                                                        <td>$55</td>
                                                        <td>$6</td>
                                                        <td>.15</td>   
                                                        <td class="text-danger">open</td>
                                                        <td>lorem lipsom text</td>
                                                        <td>23</td>                                        
                                                        <td class="action-btns">                                             
                                                            <a href="customer-clean-diary-edit.html" class="text-info" title="Create"><i class="fa fa-edit"></i></a> 
                                                            <a href="#" class="text-danger delete-alert" title="Delete"><i class="fa fa-trash"></i></a> 
                                                        </td> 
                                                    </tr> 
                                                    <tr>    
                                                        <td>4</td>                                   
                                                        <td>12/07/2018</td>
                                                        <td>Wednesday</td>                   
                                                        <td>Shadia</td>
                                                        <td>002203</td>
                                                        <td>11:00</td>                                 
                                                        <td>12:00</td>
                                                        <td>23.5</td>
                                                        <td>40.7</td>
                                                        <td>33.5</td>
                                                        <td>50.7</td>
                                                        <td>$550</td>
                                                        <td>$150</td>
                                                        <td>$3</td>
                                                        <td>.15</td>   
                                                        <td class="text-success">Completed</td>
                                                        <td>lorem lipsom text</td>
                                                        <td>23</td>                                        
                                                        <td class="action-btns">                                            
                                                            <a href="customer-clean-diary-edit.html" class="text-info" title="Create"><i class="fa fa-edit"></i></a> 
                                                            <a href="#" class="text-danger delete-alert" title="Delete"><i class="fa fa-trash"></i></a> 
                                                        </td> 
                                                    </tr> 
                                                    <tr>    
                                                        <td>5</td>                                   
                                                        <td>12/07/2018</td>
                                                        <td>Thursday</td>                                        
                                                        <td>Nadia</td>
                                                        <td>002203</td>
                                                        <td>9:00</td>                                 
                                                        <td>12:00</td>
                                                        <td>23.5</td>
                                                        <td>40.7</td>
                                                        <td>33.5</td>
                                                        <td>50.7</td>
                                                        <td>150</td>
                                                        <td>$15</td>
                                                        <td>$3</td>
                                                        <td>.15</td>   
                                                        <td class="text-danger">open</td>
                                                        <td>lorem lipsom text</td>
                                                        <td>23</td>                                        
                                                        <td class="action-btns">                                                
                                                            <a href="customer-clean-diary-edit.html" class="text-info" title="Create"><i class="fa fa-edit"></i></a> 
                                                            <a href="#" class="text-danger delete-alert" title="Delete"><i class="fa fa-trash"></i></a> 
                                                        </td> 
                                                    </tr>
                                                </tbody>
                                            </table>
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