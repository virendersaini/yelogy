@extends('admin.layout.app')

@push('title')

Dashboard

@endpush

@push('breadcrumbs')
<li class="active">Dashboard</li>
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
<!--
        <div class="row">               
            <div class="col-md-6 col-lg-3 dragdrop" draggable="true">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-four">
                            <div class="stat-icon dib">
                                <i class="ti-server text-muted"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-heading">Active Leads</div>
                                    <div class="stat-text">Total: 500</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 dragdrop" draggable="true">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-four">
                            <div class="stat-icon dib">
                                <i class="ti-timer text-muted"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-heading">Available Hours</div>
                                    <div class="stat-text">Total: 350</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           <div class="col-md-6 col-lg-3 dragdrop" draggable="true">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-four">
                            <div class="stat-icon dib">
                                <i class="ti-alarm-clock text-muted"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-heading">Client Hours</div>
                                    <div class="stat-text">Total: 250</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 dragdrop" draggable="true">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-four">
                            <div class="stat-icon dib">
                                <i class="ti-ticket text-muted"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-heading">Open Tickets</div>
                                    <a href="assign-tickets.html" class="stat-text text-danger">Total: 40</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row"> 

            <div class="col-lg-12 dragdrop" draggable="true">
                    <div class="card">
                        <div class="card-header">
                            <h4>Jobs Data</h4>
                        </div>
                        <div class="card-body">
                            <div class="default-tab">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Invoice <span>(5)</span></a>
                                        <a class="nav-item nav-link" id="nav-overdue-tab" data-toggle="tab" href="#overdue-invoice" role="tab" aria-controls="nav-home" aria-selected="true">Overdue Invoice <span>(5)</span></a>
                                        <a class="nav-item nav-link" id="nav-not-invoice-tab" data-toggle="tab" href="#not-invoice" role="tab" aria-controls="nav-home" aria-selected="true">Not Invoiced <span>(5)</span></a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Unassigned Jobs <span>(4)</span></a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Assigned Jobs <span>(4)</span></a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#job-renewal" role="tab" aria-controls="job-renewal" aria-selected="false">Tickets <span>(2)</span></a>
                                                                                      
                                    </div>
                                </nav>
                                <div class="tab-content pt-2" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">                                                
                                        <table  id="bootstrap-data-table" class="table quote-table table-striped table-bordered custom-tabledata"> 
                                            <thead> 
                                                <tr> 
                                                    <th>S.No.</th> 
                                                    <th>Invoice ID</th> 
                                                    <th>Customer Name</th> 
                                                    <th>Post Code</th> 
                                                    <th>Balance Due</th> 
                                                    <th> 
                                                        <select class="form-control table-selects">
                                                            <option>Invoice Status</option>
                                                            <option>Pending</option>
                                                            <option>Paid</option>
                                                        </select>
                                                    </th> 
                                                    <th>Invoice Due Date</th> 
                                                    <th width="10" class="alert_column_delete"></th> 
                                                </tr> 
                                            </thead> 
                                            <tbody> 
                                                <tr> 
                                                    <td>1</td> 
                                                    <td>2155</td> 
                                                    <td><a href="#">Name of person</a></td> 
                                                    <td><a href="#">65</a></td> 
                                                    <td>£5656</td> 
                                                    <td>Clear</td>
                                                    <td><span class="important">23/08/2018</span></td> 
                                                    <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
                                                </tr>
                                                <tr> 
                                                    <td>2</td> 
                                                    <td>2155</td> 
                                                    <td><a href="#">Name of person</a></td> 
                                                    <td><a href="#">65</a></td> 
                                                    <td>£5656</td> 
                                                    <td>Clear</td>
                                                    <td><span class="important">23/08/2018</span></td> 
                                                    <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
                                                </tr>
                                                <tr> 
                                                    <td>3</td> 
                                                    <td>2155</td> 
                                                    <td><a href="#">Name of person</a></td> 
                                                    <td><a href="#">65</a></td> 
                                                    <td>£5656</td> 
                                                    <td>Clear</td>
                                                    <td><span class="important">23/08/2018</span></td> 
                                                    <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
                                                </tr>
                                                <tr> 
                                                    <td>4</td> 
                                                    <td>2155</td> 
                                                    <td><a href="#">Name of person</a></td> 
                                                    <td><a href="#">65</a></td> 
                                                    <td>£5656</td> 
                                                    <td>Clear</td>
                                                    <td><span class="important">23/08/2018</span></td> 
                                                    <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
                                                </tr>
                                                <tr> 
                                                    <td>5</td> 
                                                    <td>2155</td> 
                                                    <td><a href="#">Name of person</a></td> 
                                                    <td><a href="#">65</a></td> 
                                                    <td>£5656</td> 
                                                    <td>Clear</td>
                                                    <td><span class="important">23/08/2018</span></td> 
                                                    <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
                                                </tr>
                                                
                                                
                                            </tbody> 
                                        </table>
                                    </div>

                                    <div class="tab-pane fade" id="overdue-invoice" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <table  id="bootstrap-data-table" class="table quote-table table-striped table-bordered custom-tabledata"> 
                                            <thead> 
                                                <tr> 
                                                    <th>S.No.</th> 
                                                    <th>Date</th> 
                                                    <th>Customer Name</th> 
                                                    <th>
                                                        <select class="form-control table-selects">
                                                            <option>Customer Type</option>
                                                            <option>Commercial</option>
                                                            <option>Domestic</option>
                                                        </select>
                                                    </th> 
                                                    <th>
                                                     <select class="form-control table-selects">
                                                            <option>Lead Source</option>
                                                            <option>Website</option>
                                                            <option>App</option>
                                                            <option>Google</option>
                                                        </select>
                                                    </th> 
                                                    <th>
                                                    <select class="form-control table-selects">
                                                            <option>Frequency</option>
                                                            <option>Fortnight</option>
                                                            <option>Weekly</option>
                                                            <option>Monthly</option>
                                                        </select>
                                                    </th> 
                                                    <th>Lead Status</th> 
                                                    <th width="10" class="alert_column_delete"></th> 
                                                </tr> 
                                            </thead> 
                                            <tbody> 
                                                <tr> 
                                                    <td>1</td> 
                                                    <td>20/08/2018</td> 
                                                    <td><a href="#">Name of person</a></td> 
                                                    <td><a href="#">Commercial</a></td> 
                                                    <td>Website</td> 
                                                    <td>Fortnight</td>
                                                    <td><span class="important">Pending</span></td> 
                                                    <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
                                                </tr>
                                                <tr> 
                                                    <td>2</td> 
                                                    <td>20/08/2018</td> 
                                                    <td><a href="#">Name of person</a></td> 
                                                    <td><a href="#">Commercial</a></td> 
                                                    <td>Website</td> 
                                                    <td>Fortnight</td>
                                                    <td><span class="important">Pending</span></td> 
                                                    <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
                                                </tr>
                                                <tr> 
                                                    <td>3</td> 
                                                    <td>20/08/2018</td> 
                                                    <td><a href="#">Name of person</a></td> 
                                                    <td><a href="#">Commercial</a></td> 
                                                    <td>Website</td> 
                                                    <td>Fortnight</td>
                                                    <td><span class="important">Pending</span></td> 
                                                    <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
                                                </tr>
                                                <tr> 
                                                    <td>4</td> 
                                                    <td>20/08/2018</td> 
                                                    <td><a href="#">Name of person</a></td> 
                                                    <td><a href="#">Commercial</a></td> 
                                                    <td>App</td> 
                                                    <td>Fortnight</td>
                                                    <td><span class="important">Pending</span></td> 
                                                    <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
                                                </tr>
                                                <tr> 
                                                    <td>5</td> 
                                                    <td>20/08/2018</td> 
                                                    <td><a href="#">Name of person</a></td> 
                                                    <td><a href="#">Commercial</a></td> 
                                                    <td>Google</td> 
                                                    <td>Monthly</td>
                                                    <td><span class="important"> Pending</span></td> 
                                                    <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
                                                </tr>
                                                
                                            </tbody> 
                                        </table>
                                    </div>

                                    <div class="tab-pane fade" id="not-invoice" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <table  id="bootstrap-data-table" class="table quote-table table-striped table-bordered custom-tabledata"> 
                                            <thead> 
                                                <tr> 
                                                    <th>S.No.</th> 
                                                    <th>Date</th> 
                                                    <th>Customer Name</th> 
                                                    <th>
                                                        <select class="form-control table-selects">
                                                            <option>Customer Type</option>
                                                            <option>Commercial</option>
                                                            <option>Domestic</option>
                                                        </select>
                                                    </th> 
                                                    <th>
                                                     <select class="form-control table-selects">
                                                            <option>Lead Source</option>
                                                            <option>Website</option>
                                                            <option>App</option>
                                                            <option>Google</option>
                                                        </select>
                                                    </th> 
                                                    <th>
                                                    <select class="form-control table-selects">
                                                            <option>Frequency</option>
                                                            <option>Fortnight</option>
                                                            <option>Weekly</option>
                                                            <option>Monthly</option>
                                                        </select>
                                                    </th> 
                                                    <th>Lead Status</th> 
                                                    <th width="10" class="alert_column_delete"></th> 
                                                </tr> 
                                            </thead> 
                                            <tbody> 
                                                <tr> 
                                                    <td>1</td> 
                                                    <td>20/08/2018</td> 
                                                    <td><a href="#">Name of person</a></td> 
                                                    <td><a href="#">Commercial</a></td> 
                                                    <td>Website</td> 
                                                    <td>Fortnight</td>
                                                    <td><span class="important">Pending</span></td> 
                                                    <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
                                                </tr>
                                                <tr> 
                                                    <td>2</td> 
                                                    <td>20/08/2018</td> 
                                                    <td><a href="#">Name of person</a></td> 
                                                    <td><a href="#">Commercial</a></td> 
                                                    <td>Website</td> 
                                                    <td>Fortnight</td>
                                                    <td><span class="important">Pending</span></td> 
                                                    <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
                                                </tr>
                                                <tr> 
                                                    <td>3</td> 
                                                    <td>20/08/2018</td> 
                                                    <td><a href="#">Name of person</a></td> 
                                                    <td><a href="#">Commercial</a></td> 
                                                    <td>Website</td> 
                                                    <td>Fortnight</td>
                                                    <td><span class="important">Pending</span></td> 
                                                    <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
                                                </tr>
                                                <tr> 
                                                    <td>4</td> 
                                                    <td>20/08/2018</td> 
                                                    <td><a href="#">Name of person</a></td> 
                                                    <td><a href="#">Commercial</a></td> 
                                                    <td>App</td> 
                                                    <td>Fortnight</td>
                                                    <td><span class="important">Pending</span></td> 
                                                    <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
                                                </tr>
                                                <tr> 
                                                    <td>5</td> 
                                                    <td>20/08/2018</td> 
                                                    <td><a href="#">Name of person</a></td> 
                                                    <td><a href="#">Commercial</a></td> 
                                                    <td>Google</td> 
                                                    <td>Monthly</td>
                                                    <td><span class="important"> Pending</span></td> 
                                                    <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
                                                </tr>
                                                
                                            </tbody> 
                                        </table>
                                    </div>

                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <table  id="bootstrap-data-table" class="table quote-table table-striped table-bordered custom-tabledata"> 
                                            <thead> 
                                                <tr> 
                                                    <th>S.No.</th> 
                                                    <th>Date</th> 
                                                    <th>Customer Name</th> 
                                                    <th>
                                                        <select class="form-control table-selects">
                                                            <option>Customer Type</option>
                                                            <option>Commercial</option>
                                                            <option>Domestic</option>
                                                        </select>
                                                    </th> 
                                                    <th>
                                                     <select class="form-control table-selects">
                                                            <option>Lead Source</option>
                                                            <option>Website</option>
                                                            <option>App</option>
                                                            <option>Google</option>
                                                        </select>
                                                    </th> 
                                                    <th>
                                                    <select class="form-control table-selects">
                                                            <option>Frequency</option>
                                                            <option>Fortnight</option>
                                                            <option>Weekly</option>
                                                            <option>Monthly</option>
                                                        </select>
                                                    </th> 
                                                    <th>Lead Status</th> 
                                                    <th width="10" class="alert_column_delete"></th> 
                                                </tr> 
                                            </thead> 
                                            <tbody> 
                                                <tr> 
                                                    <td>1</td> 
                                                    <td>20/08/2018</td> 
                                                    <td><a href="#">Name of person</a></td> 
                                                    <td><a href="#">Commercial</a></td> 
                                                    <td>Website</td> 
                                                    <td>Fortnight</td>
                                                    <td><span class="important">Pending</span></td> 
                                                    <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
                                                </tr>
                                                <tr> 
                                                    <td>2</td> 
                                                    <td>20/08/2018</td> 
                                                    <td><a href="#">Name of person</a></td> 
                                                    <td><a href="#">Commercial</a></td> 
                                                    <td>Website</td> 
                                                    <td>Fortnight</td>
                                                    <td><span class="important">Pending</span></td> 
                                                    <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
                                                </tr>
                                                <tr> 
                                                    <td>3</td> 
                                                    <td>20/08/2018</td> 
                                                    <td><a href="#">Name of person</a></td> 
                                                    <td><a href="#">Commercial</a></td> 
                                                    <td>Website</td> 
                                                    <td>Fortnight</td>
                                                    <td><span class="important">Pending</span></td> 
                                                    <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
                                                </tr>
                                                <tr> 
                                                    <td>4</td> 
                                                    <td>20/08/2018</td> 
                                                    <td><a href="#">Name of person</a></td> 
                                                    <td><a href="#">Commercial</a></td> 
                                                    <td>App</td> 
                                                    <td>Fortnight</td>
                                                    <td><span class="important">Pending</span></td> 
                                                    <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
                                                </tr>
                                                <tr> 
                                                    <td>5</td> 
                                                    <td>20/08/2018</td> 
                                                    <td><a href="#">Name of person</a></td> 
                                                    <td><a href="#">Commercial</a></td> 
                                                    <td>Google</td> 
                                                    <td>Monthly</td>
                                                    <td><span class="important"> Pending</span></td> 
                                                    <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
                                                </tr>
                                                
                                            </tbody> 
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                        <table  id="bootstrap-data-table" class="table quote-table table-striped table-bordered custom-tabledata"> 
                                            <thead> 
                                                <tr> 
                                                    <th>S.No.</th> 
                                                    <th>Date</th> 
                                                    <th>Customer Name</th> 
                                                    <th>
                                                        <select class="form-control table-selects">
                                                            <option>Customer Type</option>
                                                            <option>Commercial</option>
                                                            <option>Domestic</option>
                                                        </select>
                                                    </th> 
                                                    <th>
                                                        <select class="form-control table-selects">
                                                            <option>Lead Source</option>
                                                            <option>Website</option>
                                                            <option>App</option>
                                                            <option>Google</option>
                                                        </select>
                                                    </th> 
                                                    <th>Helper Name</th> 
                                                    <th>Total Hours</th> 
                                                    <th>
                                                        <select class="form-control table-selects">
                                                            <option>Frequency</option>
                                                            <option>Fortnight</option>
                                                            <option>Weekly</option>
                                                            <option>Monthly</option>
                                                        </select>
                                                    </th> 
                                                    <th>Lead Status</th> 
                                                    <th width="10" class="alert_column_delete"></th> 
                                                </tr> 
                                            </thead> 
                                            <tbody> 
                                                <tr> 
                                                    <td>1</td> 
                                                    <td>20/08/2018</td> 
                                                    <td><a href="#">Name of person</a></td> 
                                                    <td><a href="#">Commercial</a></td> 
                                                    <td>Website</td> 
                                                    <td>Helper name</td>
                                                    <td>55</td>
                                                    <td>Fortnight</td>
                                                    <td><span class="important">Completed</span></td> 
                                                    <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
                                                </tr>
                                                <tr> 
                                                    <td>2</td> 
                                                    <td>20/08/2018</td> 
                                                    <td><a href="#">Name of person</a></td> 
                                                    <td><a href="#">Commercial</a></td> 
                                                    <td>App</td> 
                                                    <td>Helper name</td>
                                                    <td>55</td>
                                                    <td>Monthly</td>
                                                    <td><span class="important">Completed</span></td> 
                                                    <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
                                                </tr>
                                                <tr> 
                                                    <td>3</td> 
                                                    <td>20/08/2018</td> 
                                                    <td><a href="#">Name of person</a></td> 
                                                    <td><a href="#">Commercial</a></td> 
                                                    <td>App</td> 
                                                    <td>Helper name</td>
                                                    <td>55</td>
                                                    <td>Weekly</td>
                                                    <td><span class="important">Completed</span></td> 
                                                    <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
                                                </tr>
                                                <tr> 
                                                    <td>4</td> 
                                                    <td>20/08/2018</td> 
                                                    <td><a href="#">Name of person</a></td> 
                                                    <td><a href="#">Commercial</a></td> 
                                                    <td>App</td> 
                                                    <td>Helper name</td>
                                                    <td>55</td>
                                                    <td>Fortnight</td>
                                                    <td><span class="important">Completed</span></td> 
                                                    <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
                                                </tr>
                                                <tr> 
                                                    <td>5</td> 
                                                    <td>20/08/2018</td> 
                                                    <td><a href="#">Name of person</a></td> 
                                                    <td><a href="#">Commercial</a></td> 
                                                    <td>App</td> 
                                                    <td>Helper name</td>
                                                    <td>55</td>
                                                    <td>Fortnight</td>
                                                    <td><span class="important">Completed</span></td> 
                                                    <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
                                                </tr>   
                                            </tbody> 
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="job-renewal" role="tabpanel" aria-labelledby="nav-contact-tab">
                                        <table  id="bootstrap-data-table" class="table quote-table table-striped table-bordered custom-tabledata">
                                            <thead> 
                                                <tr> 
                                                    <th>S.No.</th> 
                                                    <th>Date</th> 
                                                    <th>Name</th>
                                                    <th>Subject</th> 
                                                    <th>
                                                    <select class="form-control table-selects">
                                                            <option>Contact Sources</option>
                                                            <option>All</option>
                                                            <option>Customer</option>
                                                            <option>Helper</option>
                                                        </select>
                                                    </th> 
                                                    <th>Staff/Member</th> 
                                                    <th>Reason</th> 
                                                    <th>Status</th> 
                                                    <th width="10" class="alert_column_delete"></th> 
                                                </tr> 
                                            </thead> 
                                            <tbody> 
                                                <tr> 
                                                    <td>1</td> 
                                                    <td>20/08/2018</td> 
                                                    <td><a href="#">Name of person</a></td> 
                                                    <td><a href="#">Dummy</a></td> 
                                                    <td>Customer</td> 
                                                    <td>Smith John</td>
                                                    <td>Personal</td>
                                                    <td><span class="important">Close</span></td> 
                                                    <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
                                                </tr>
                                                <tr> 
                                                    <td>1</td> 
                                                    <td>20/08/2018</td> 
                                                    <td><a href="#">Name of person</a></td> 
                                                    <td><a href="#">Dummy</a></td> 
                                                    <td>Helper</td> 
                                                    <td>Smith John</td>
                                                    <td>Personal</td>
                                                    <td><span class="text-success">Open</span></td> 
                                                    <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
                                                </tr>
                                                <tr> 
                                                    <td>1</td> 
                                                    <td>20/08/2018</td> 
                                                    <td><a href="#">Name of person</a></td> 
                                                    <td><a href="#">Dummy</a></td> 
                                                    <td>Customer</td> 
                                                    <td>John</td>
                                                    <td>Personal</td>
                                                    <td><span class="text-success">Open</span></td> 
                                                    <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
                                                </tr>
                                                <tr> 
                                                    <td>1</td> 
                                                    <td>20/08/2018</td> 
                                                    <td><a href="#">Name of person</a></td> 
                                                    <td><a href="#">Dummy</a></td> 
                                                    <td>Customer</td> 
                                                    <td>Rocky</td>
                                                    <td>Personal</td>
                                                    <td><span class="important">Close</span></td> 
                                                    <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
                                                </tr>
                                                <tr> 
                                                    <td>1</td> 
                                                    <td>20/08/2018</td> 
                                                    <td><a href="#">Name of person</a></td> 
                                                    <td><a href="#">Dummy</a></td> 
                                                    <td>Helper</td> 
                                                    <td>Smith John</td>
                                                    <td>Personal</td>
                                                    <td><span class="text-success">Open</span></td> 
                                                    <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
                                                </tr>
                                            </tbody> 
                                        </table>
                                    </div>                                            
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        <div class="col-md-12 col-lg-4 dragdrop" draggable="true">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">This Week Job</strong>
                </div>
                <div class="card-body">
                    <table class="table week-table table-striped">
                                <thead>
                                <tr>
                                    <th width="70%" class="">Day</th>
                                    <th width="30%" class="">Work Hours</th>
                                 </tr>
                                </thead>
                                <tbody>                            
                                    <tr>
                                        <td>Mon 27th</td>
                                        <td><a href="#">77 (£8/hr)</a></td>        
                                     </tr>
                                      <tr>
                                        <td>Tue 28th</td>
                                        <td><a href="#">77 (£8/hr)</a></td>
                                    </tr>
                                    <tr class="highlight">
                                        <td>Mon 27th</td>
                                        <td><a href="#">77 (£8/hr)</a></td>
                                     </tr>
                                      <tr>
                                        <td>Tue 28th</td>
                                        <td><a href="#">77 (£8/hr)</a></td>
                                    </tr>
                                    <tr>
                                        <td>Mon 27th</td>
                                        <td><a href="#">77 (£8/hr)</a></td>
                                     </tr>
                                      <tr>
                                        <td>Tue 28th</td>
                                        <td><a href="#">77 (£8/hr)</a></td>
                                    </tr>
                                    <tr>
                                        <td>Mon 27th</td>
                                        <td><a href="#">77 (£8/hr)</a></td>
                                     </tr>
                                      <tr>
                                        <td>Tue 28th</td>
                                        <td><a href="#">77 (£8/hr)</a></td>        
                                    </tr>                                          
                                </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-4 dragdrop" draggable="true">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Previous Week Job</strong>
                </div>
                <div class="card-body">
                    <table class="table week-table table-striped">
                                <thead>
                                <tr>
                                    <th width="70%" class="">Day</th>
                                    <th width="30%" class="">Work Hours</th>
                                 </tr>
                                </thead>
                                <tbody>                            
                                    <tr>
                                        <td>Mon 27th</td>
                                        <td><a href="#">77 (£8/hr)</a></td>        
                                     </tr>
                                      <tr>
                                        <td>Tue 28th</td>
                                        <td><a href="#">77 (£8/hr)</a></td>
                                    </tr>
                                    <tr class="highlight">
                                        <td>Mon 27th</td>
                                        <td><a href="#">77 (£8/hr)</a></td>
                                     </tr>
                                      <tr>
                                        <td>Tue 28th</td>
                                        <td><a href="#">77 (£8/hr)</a></td>
                                    </tr>
                                    <tr>
                                        <td>Mon 27th</td>
                                        <td><a href="#">77 (£8/hr)</a></td>
                                     </tr>
                                      <tr>
                                        <td>Tue 28th</td>
                                        <td><a href="#">77 (£8/hr)</a></td>
                                    </tr>
                                    <tr>
                                        <td>Mon 27th</td>
                                        <td><a href="#">77 (£8/hr)</a></td>
                                     </tr>
                                      <tr>
                                        <td>Tue 28th</td>
                                        <td><a href="#">77 (£8/hr)</a></td>        
                                    </tr>                                          
                                </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-4 dragdrop" draggable="true">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Next Week Job</strong>
                </div>
                <div class="card-body">
                     <table class="table week-table table-striped">
                                <thead>
                                <tr>
                                    <th width="70%" class="">Day</th>
                                    <th width="30%" class="">Work Hours</th>
                                 </tr>
                                </thead>
                                <tbody>                            
                                    <tr>
                                        <td>Mon 27th</td>
                                        <td><a href="#">77 (£8/hr)</a></td>        
                                     </tr>
                                      <tr>
                                        <td>Tue 28th</td>
                                        <td><a href="#">77 (£8/hr)</a></td>
                                    </tr>
                                    <tr class="highlight">
                                        <td>Mon 27th</td>
                                        <td><a href="#">77 (£8/hr)</a></td>
                                     </tr>
                                      <tr>
                                        <td>Tue 28th</td>
                                        <td><a href="#">77 (£8/hr)</a></td>
                                    </tr>
                                    <tr>
                                        <td>Mon 27th</td>
                                        <td><a href="#">77 (£8/hr)</a></td>
                                     </tr>
                                      <tr>
                                        <td>Tue 28th</td>
                                        <td><a href="#">77 (£8/hr)</a></td>
                                    </tr>
                                    <tr>
                                        <td>Mon 27th</td>
                                        <td><a href="#">77 (£8/hr)</a></td>
                                     </tr>
                                      <tr>
                                        <td>Tue 28th</td>
                                        <td><a href="#">77 (£8/hr)</a></td>        
                                    </tr>                                          
                                </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-12 dragdrop" draggable="true">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Just Helper Team</strong>
                </div>
                <div class="card-body">
          <table id="bootstrap-data-table" class="table table-striped table-bordered custom-tabledata">
            <thead>
              <tr>
                <th width="10">S.No.</th>
                <th>Name</th>
                <th>Role</th>
                <th>Log Status</th>
                <th>Today's Status</th>
                <th width="10" class="alert_column_delete"></th> 
              </tr>
            </thead>
            <tbody>
              <tr>
                <td width="10">1</td>
                <td>John Smith</td>
                <td>Sales</td>
                <td class="text-success">Active</td>
                <td>On Leave</td>
                <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
              </tr>
              <tr>
                <td width="10">2</td>
                <td>Ben stokes</td>
                <td>Recruitment</td>
                <td class="text-success">Active</td>
                <td>Work from home</td>
                <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
              </tr>
              <tr>
                <td width="10">3</td>
                <td>Flintoff</td>
                <td>Recruitment</td>
                <td class="text-success">Active</td>
                <td>Present</td>
                <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
              </tr>
              <tr>
                <td width="10">4</td>
                <td>Piterson</td>
                <td>Operations</td>
                <td class="text-danger">inactive</td>
                <td>Present</td>
                <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
              </tr>
              <tr>
                <td width="10">5</td>
                <td>Anderson</td>
                <td>Sales</td>
                <td class="text-success">Active</td>
                <td>On Leave</td>
                <td width="10"> <a href="#" class="delete-alert"><i class="fa fa-trash"></i></a> </td> 
              </tr>
            </tbody>
          </table>
                </div>
            </div>
        </div>

        

        </div>
-->
    </div><!-- .animated -->

</div>
@endsection