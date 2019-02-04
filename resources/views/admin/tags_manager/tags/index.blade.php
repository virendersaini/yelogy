@extends('admin.layout.app')

@push('title')

Tag Management

@endpush

@push('breadcrumbs')
<li><a href="">Home</a></li>
<li class="active"> Tag Management</li>
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
           <div class="col-md-3">
                <div class="card">
                    <a href="{{route('tag-listing')}}?map=house&type=bedroom"  class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> Bedroom Type</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <a href="{{route('tag-listing')}}?map=house&type=bathroom"  class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> Add Bathroom Type</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <a href="{{route('tag-listing')}}?map=house&type=kitchen"  class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> Add Kitchen Type</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <a href="{{route('tag-listing')}}?map=house&type=living room"  class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> Add Living room / Reception Type</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <a href="{{route('tag-listing')}}?map=house&type=utility room"  class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> Add Utility room Type</a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <a href="{{route('tag-listing')}}?map=house&type=study"  class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> Add Study Type</a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <a href="{{route('tag-listing')}}?map=house&type=hallway"  class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> Add Hallway Type</a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <a href="{{route('tag-listing')}}?map=house&type=stairs"  class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> Add Stairs Type</a>
                </div>
            </div>
            
                    </div>
                    
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div> <!-- .content -->

<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Tag</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <form id="tags">
                <div class="modal-body">
                    <div class="row">
                       <div class="col-sm-6">
                            <?php $options = houseTagsType(); ?>
                           <label for="tag_type" class=" form-control-label">Tag Type</label>
                           {!!Form::select('tag_type', $options, null, ['class' => "form-control tag_type"])!!}
                           <span class="error"></span>
                       </div>
                       <div class="col-sm-6">
                            <label class=" form-control-label">Tag Name</label>
                            <input type="text" name="tag_name" value="" class="tag_name form-control">
                            <span class="error"></span>
                       </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success addLoading">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="edit_model">
</div>

@endsection
@push('scripts')
<script type="text/javascript">	
	$(document).ready(function() {
        $('#bootstrap-data-table').DataTable({
            processing: true,
            serverSide: true,
            pageLength: 15,
            //bInfo:false,
            lengthChange : false,
            language: {
	            lengthMenu: "_MENU_",
	            search: "<strong>Search Filter</strong> ",
	            searchPlaceholder: "Type and Press Enter.."
	        },
            ajax: '{{url('admin/tag_list')}}',
            columns: [
                {data: 'tag_type', name : 'tag_type'},
                {data: 'tag_name', name : 'tag_name'},
                {data: 'action', name : 'action', className: 'action-btn'}
            ],
            initComplete: function () {
                this.api().columns([0]).every( function () {
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
    /*$(document).on('submit', '#tags', function (event) {
        event.preventDefault();
        $('.error').empty();
        $('.addLoading').LoadingOverlay("show");
        axios.post("{{route('tag-manager.store')}}", $(this).serialize()).then(function (response) {
            $('.addLoading').LoadingOverlay("hide");
            if (response.data.status) {
                $.notify(response.data.message, "success");
                $('#myModal').modal('hide');
                $('.modal-backdrop').removeClass('show');

                setTimeout(function(){
                    location.reload();}, 2000);

                return false;
            }else{
                $.notify(response.data.message, "error");
                return false;
            }            
        }).catch(function (error) {
            $('.addLoading').LoadingOverlay("hide");
            $.each(error.response.data.errors, function (key, value) {
                $("#tags").find("." + key).next("span.error").css({"color" : "red","font-size" : "85%"}).text(value)
            });
        });
    });*/
    $('.tagsmanager').on('click', "[id^='edit_']", function(){
        var id = $(this).prop('name');
        var url = window.app.url+'/admin/tag-manager/'+id+'/edit';
        axios.get(url)
          .then(function (response) {
            $('#edit_model').html(response.data);
            $('#edit_model').modal('toggle').addClass('show');
            
            return false;
          })
          .catch(function (error) {
            console.log(error);
          });
    });
    $(document).on('submit', '#tags_edit', function (event) {
        event.preventDefault();
        //$('.editloading').LoadingOverlay("show");
        $('.error').empty();
        var id = $('[name=id]').val();
        var url = window.app.url+'/admin/tag-manager/'+id;
        axios.put(url, $(this).serialize()).then(function (response) {
                //$('#edit_model').modal('hide');
                //$('.editloading').LoadingOverlay("hide"); 
                setTimeout(function(){
                location.reload();}, 2000);   
        }).catch(function (error) {
            //$('.editloading').LoadingOverlay("hide"); 
            $.each(error.response.data.errors, function (key, value) {
                $("#tags_edit").find("." + key).next("span.error").css({"color" : "red","font-size" : "85%"}).text(value)
            });
        });
    });
</script>
@endpush

@push('scripts')
<script type="text/javascript">	
	$('#bootstrap-data-table').on('click','.deletemen',function(e){		
		if(confirm('Are you sure, you want to delete this item ?')){
			$(this).parents('form').submit();
		}else{
			e.preventDefault();
		}
	});
	$('.alert').fadeOut(4000);
</script>
@endpush
