@extends('admin.layout.app')

@push('title')

JH Packages

@endpush

@push('breadcrumbs')
<li><a href="index.html">Home</a></li>
<li class="active">JH Packages</li>
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
                            
                        </div>
                        <a href="{{route('packages.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> Add New Package</a>
                    </div>
                    <div class="card-body">                           
                        <div class="table-responsive">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered custom-tabledata">
                                <thead>
                                    <tr>
                                        <th>Name</th>
						              	<th>Status</th>
						              	<th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($packages as $package)
                                    <tr>
                                        <td>{{$package->name ?? ''}}</td>                                        
                                        <td>{{ ucfirst($package->status ?? '')}}</td>
                                        <td>
                                            <a href="{{route('packages.edit',$package->id)}}"><i class="fa fa-edit"></i></a>

                                            <a href="javascript:void(0)" -button-type="delete" class="deletemen delete-alert text-danger"><i class="fa fa-trash"></i></a> 
                                            <form action="{{ route('packages.destroy',$package->id)}}" method="POST" id="delete" name="delete" class="dispfr">
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
     	});
	</script>
@endpush
