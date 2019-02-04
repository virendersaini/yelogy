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
	@flashMessage()
		{{-- Session Flash Messages  --}}
	@endflashMessage
    <div class="animated fadeIn">
        <div class="row">
           <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="dropdown pull-left">
                            
                        </div>
                        <a href="{{route('staff.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> Add New Member</a>
                    </div>
                    <div class="card-body">                           
                        <div class="table-responsive">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered custom-tabledata">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
						              	<th>Email</th>
						              	<th>Phone</th>
						              	<th>Address</th>
						              	<th>Postcode</th> 
						              	<th>Joining Date</th> 
						              	<th>User Group</th> 
						              	<th>Status</th>
						              	<th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td></td>
                                        <td>{{$user->name ?? ''}}</td>
                                        <td>{{$user->email ?? ''}}</td>
                                        <td>{{$user->phone_number ?? ''}}</td>
                                        <td>{{optional($user->staffdetails)->address ?? ''}}</td>
                                        <td>{{optional($user->staffdetails)->postcode ?? ''}}</td>
                                        <td>{{beauty_date(optional($user->staffdetails)->joining_date ?? '','d/m/Y')}}</td>
                                        <td>
                                            @php 
                                            $prefix = $fruitList = '';
                                            foreach ($user->roles as $role) {
                                            $fruitList .= $prefix . '' . ucfirst($role->name) . '';
                                            $prefix = ', ';
                                            }
                                            @endphp 
                                            {{$fruitList}}
                                        </td>
                                        <td>{{ ucfirst($user->status ?? '')}}</td>
                                        <td>
                                            <a href="{{route('staff.edit',$user->id)}}"><i class="fa fa-edit"></i></a>

                                            <a href="javascript:void(0)" -button-type="delete" class="deletemen delete-alert text-danger"><i class="fa fa-trash"></i></a> 
                                            <form action="{{ route('staff.destroy',$user->id)}}" method="POST" id="delete" name="delete" class="dispfr">
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

@endsection

@push('scripts')

<script type="text/javascript">	
	$(document).ready(function() {
        var datatable = 
            $('#bootstrap-data-table').DataTable({
                ordering:false,
                pageLength: 15,
                lengthChange : false,
                language: {
                    lengthMenu: "_MENU_",
                    search: "<strong>Search Filter</strong> ",
                    searchPlaceholder: "Type and Press Enter.."
                },
                    "oLanguage": {
                    "sEmptyTable": "No matching records found"
                },
                initComplete: function () {
                    this.api().columns([7]).every( function () {
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
       
            datatable.on( 'order.dt search.dt', function () {
                datatable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();
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