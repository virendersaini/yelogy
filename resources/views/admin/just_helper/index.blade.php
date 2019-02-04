@extends('admin.layout.app')

@push('title')

Helpers

@endpush

@push('breadcrumbs')
<li><a href="">Home</a></li>
<li class="active"> Helpers</li>
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
                        <div class="dropdown pull-left">
                            <!-- <button class="btn btn-primary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                             Action                     
                            </button> -->
                            <!-- <div class="dropdown-menu action-drop" aria-labelledby="message">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <a href="#"> New</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#"> Export</a>
                                    </li>                                   
                                </ul>                        
                            </div> -->
                        </div>
                        <a href="{{route('just-helper.create')}}" data-toggle="modal" data-target="#new-customer" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> Add New Helper</a>
                    </div>
                    <div class="card-body">                           
                        <div class="table-responsive">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered custom-tabledata">
                                <thead>
                                    <tr>
                                        <th>Helper Name</th>
						              	<th>ID</th>
						              	<th>Category</th>
						              	<th>Postcode</th>
						              	<th>Status</th> 
						              	<th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name ?? ''}}</td>
                                        <td>{{$user->id ?? ''}}</td>
                                        <td>{{optional($user->helperdetails)->type}}</td>
                                        <td>{{optional($user->helperdetails)->invoice_postcode}}</td>
                                        <td>{{ucfirst(optional($user->helperdetails)->status ?? '')}}</td>
                                        <td>
                                            <a href="{{route('just-helper.edit',$user->id)}}"><i class="fa fa-edit"></i></a>
                                            <a href="{{route('just-helper.show',$user->id)}}"><i class="fa fa-eye"></i>
                                            </a>   

                                            <a href="javascript:void(0)" -button-type="delete" class="deletemen delete-alert text-danger"><i class="fa fa-trash"></i></a> 
                                            <form action="{{ route('just-helper.destroy',$user->id)}}" method="POST" id="delete" name="delete" class="dispfr">
                                                {{ csrf_field() }}
                                                {!! method_field('delete') !!}
                   
                                            </form>                
                                        </td>
                                    </tr>
                                    @endforeach           
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div> <!-- .content -->
<!-- Models -->
<div class="modal fade" id="new-customer" tabindex="-1" role="dialog" aria-labelledby="new-customerLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel">Select Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('just-helper.create')}}" method="get">
                <div class="modal-body"> 
                    <?php $option = category(); ?>
                    {!!Form::select('category',$option, null, ['class' => "form-control"])!!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">	
	$(document).ready(function() {
        $('#bootstrap-data-table').DataTable({
            ordering:false,
            pageLength: 15,
            lengthChange : false,
            language: {
	            lengthMenu: "_MENU_",
	            search: "<strong>Search Filter</strong> ",
	            searchPlaceholder: "Type and Press Enter.."
	        }, 
            initComplete: function () {
                this.api().columns([2,3,4]).every( function () {
                    var column = this;
                    var title = $(column.header()).text() + " Filter ";
                    var select = $('<select><option value="">'+title+'</option></select>')
                        .appendTo( $(column.header()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
                            column.search( val ? '^'+val+'$' : '', true, false ).draw();
                        });
                        column.data().unique().sort().each( function ( d, j ) {
                            select.append( '<option value="'+d+'">'+d+'</option>' )
                        });
                });
            },
        });
    });
    /*$(document).on('change', "[id^='switch_input_']", function(){
    	var checked = 0;
    	var id = $(this).prop('name');
    	if ($(this).prop('checked')) {
    		checked = 1;
    	}else{
    		checked = 0;
    	}
    	$.ajaxSetup({
          	headers: {
              	'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          	}
	    });
	    $.ajax({
            url: "{{ url('admin/change-status') }}",
            method: 'post',
            data: {status: checked,id: id},
          	success: function(result){
             	location.reload();
          	}
        });
    });*/
</script>

<script type="text/javascript">	
	$('#bootstrap-data-table').on('click','.deletemen',function(e){        
        if(confirm('Are you sure, you want to delete this staff ?')){

            $('#delete').submit();
        }else{
            e.preventDefault();
        }
    });
    $('.alert').fadeOut(4000);
</script>
@endpush