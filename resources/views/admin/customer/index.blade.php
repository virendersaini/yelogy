@extends('admin.layout.app')

@push('title')

Stores

@endpush

@push('breadcrumbs')
<li><a href="index.html">Home</a></li>
<li class="active"> Add Store</li>
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
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                       
                        <a href="{{url('admin/customer/create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> New Store</a>
                      
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered custom-tabledata">
                            <thead>
                              <tr>

                                <th>Name</th>
                                <th>Store Type</th>
                                <th>Deliver Time</th>
                                <th>email</th>
                                <th>mobile</th>
                                <th>pincode</th>
                                <th>Created Date</th>
                                <th>Status</th>
                                <th width="10" class="alert_column_delete">Action</th> 
                              </tr>
                            </thead>
                            <tbody>
                            @if(!empty($customer))
                                @foreach($customer as $key => $customers)
                                    <?php //pr($customers->house_map); ?>
                                    <tr>
                                        <td>{{$customers->name}}</td>
                                        <td>{{$customers->store_type}}</td>
                                        <td>{{$customers->delivery_time}}</td>
                                        <td>{{$customers->email}}</td>
                                        <td>{{$customers->mobile}}</td>
                                        <td>{{$customers->pincode}}</td>
                                        <!-- <td>16</td> -->
                                        <td>{{date('Y-m-d',strtotime($customers->created_at))}}</td>
                                        <td class="text-success">{{$customers->status}}</td>
                                        <td width="10" class="action-btns"> 
                                           <!--  <a href="#"><i class="fa fa-eye"></i></a>  -->
                                            <a href="{{route('customer.edit',$customers->id)}}"><i class="fa fa-edit"></i></a>  
                                            <a href="javascript:void(0)" -button-type="delete" class="deletemen delete-alert text-danger"><i class="fa fa-trash"></i></a> 
                                            <form action="{{ route('customer.destroy',$customers->id)}}" method="POST" id="delete" name="delete" class="dispfr">
                                                {{ csrf_field() }}
                                                {!! method_field('delete') !!}
                   
                                            </form>
                                        </td> 
                                    </tr>
                                @endforeach
                                <?php //die; ?>
                            @endif                  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div> <!-- .content -->

@endsection
@push('scripts')
<script type="text/javascript"> 
    $(document).ready(function() {
        $('#bootstrap-data-table').DataTable();
    });
     $('#bootstrap-data-table').on('click','.deletemen',function(e){        
        if(confirm('Are you sure, you want to delete this store ?')){

            $('#delete').submit();
        }else{
            e.preventDefault();
        }
    });
    $('.alert').fadeOut(4000);
</script>
@endpush
