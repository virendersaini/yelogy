@extends('admin.layout.app')

@push('title')

Banners

@endpush

@push('breadcrumbs')
<li><a href="index.html">Home</a></li>
<li class="active"> Add Banner</li>
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
                       
                        <a href="{{url('admin/banner_create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i>New Banner</a>
                      
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered custom-tabledata">
                            <thead>
                              <tr>

                                <th>Banner Type</th>
                                <th>Product Name</th>
                                <th>Image</th>
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
                                        <td>{{$customers->banner_type}}</td>
                                        <td>{{$customers->product->name}}</td>
                                        <td>{!! Html::image('public/uploads/banner/'.$customers->image,'',array('width'=>'100px')) !!}
</td>
                                        <td>{{date('Y-m-d',strtotime($customers->created_at))}}</td>
                                        <td class="text-success">{{$customers->status}}</td>
                                        <td width="10" class="action-btns"> 
                                           <!--  <a href="#"><i class="fa fa-eye"></i></a>  -->
                                            <a href="{{route('banner_edit',$customers->id)}}"><i class="fa fa-edit"></i></a>  
                                            <a href="javascript:void(0)" -button-type="delete" class="deletemen delete-alert text-danger"><i class="fa fa-trash"></i></a> 
                                            <form action="{{ url('admin/banner_destroy',$customers->id)}}" method="POST" id="delete" name="delete" class="dispfr">
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
        if(confirm('Are you sure, you want to delete this banner ?')){

            $('#delete').submit();
        }else{
            e.preventDefault();
        }
    });
    $('.alert').fadeOut(4000);
</script>
@endpush
