@extends('admin.layout.app')

@push('title')

Marketing Manager

@endpush

@push('breadcrumbs')
<li><a href="">Home</a></li>
<li class="active"> Marketing Manager</li>
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
                        <!-- <div class="dropdown pull-left">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                             Action                     
                            </button>
                            <div class="dropdown-menu action-drop" aria-labelledby="message">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <a href="#"> New</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#"> Export</a>
                                    </li>                                   
                                </ul>                        
                            </div>
                        </div> -->
                        <a href="#" data-toggle="modal" data-target="#myModal"  class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i>Add</a>
                    </div>
                    <div class="card-body tagsmanager">                           
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
                                                    
                                </tbody>
                            </table>
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
                <h4 class="modal-title">Add Marketing Fields</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <form id="marketing">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <label class=" form-control-label">Name</label>
                            <input type="text" name="name" value="" class="name form-control">
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
            lengthChange : false,
            language: {
	            lengthMenu: "_MENU_",
	            search: "<strong>Search Filter</strong> ",
	            searchPlaceholder: "Type and Press Enter.."
	        },
            ajax: '{{url('admin/market_list')}}',
            columns: [
                {data: 'name', name : 'name'},
                {data: 'status', name : 'status'},
                {data: 'action', name : 'action', className: 'action-btn'}
            ],
        });
    });
    $(document).on('submit', '#marketing', function (event) {
        event.preventDefault();
        $('.error').empty();
        $('.addLoading').LoadingOverlay("show");
        axios.post("{{route('marketing.store')}}", $(this).serialize()).then(function (response) {
            $('.addLoading').LoadingOverlay("hide");
            if (response.data.status) {
                $.notify(response.data.message, "success");
                $('#myModal').modal('hide');
                $('.modal-backdrop').removeClass('show');
                setTimeout(function(){
                    location.reload();}, 1000);
                return false;
            }else{
                $.notify(response.data.message, "error");
                return false;
            }            
        }).catch(function (error) {
            $('.addLoading').LoadingOverlay("hide");
            $.each(error.response.data.errors, function (key, value) {
                $("#marketing").find("." + key).next("span.error").css({"color" : "red","font-size" : "85%"}).text(value)
            });
        });
    });
    $(document).on('click', "[id^='edit_']", function(){
        var id = $(this).prop('name');
        var url = window.app.url+'/admin/marketing/'+id+'/edit';
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
    $(document).on('submit', '#market_edit', function (event) {
        event.preventDefault();
        $('.editloading').LoadingOverlay("show");
        $('.error').empty();
        var id = $('[name=id]').val();
        var url = window.app.url+'/admin/marketing/'+id;
        axios.put(url, $(this).serialize()).then(function (response) {
                $('#edit_model').modal('hide');
                $('.editloading').LoadingOverlay("hide"); 
                setTimeout(function(){
                location.reload();}, 1000);   
        }).catch(function (error) {
            $('.editloading').LoadingOverlay("hide"); 
            $.each(error.response.data.errors, function (key, value) {
                $("#market_edit").find("." + key).next("span.error").css({"color" : "red","font-size" : "85%"}).text(value)
            });
        });
    });
</script>
@endpush

@push('scripts')
<script type="text/javascript">	
	$(document).on('click','.deletemen',function(e){		
		if(confirm('Are you sure, you want to delete this item ?')){
			$("#delete").submit();
		}else{
			e.preventDefault();
		}
	});
	$('.alert').fadeOut(4000);
</script>
@endpush