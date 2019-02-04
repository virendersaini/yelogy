@extends('admin.layout.app')

@push('title')

Product Manager

@endpush

@push('breadcrumbs')
<li><a href="">Home</a></li>
<li class="active"> Product Manager</li>
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
	@flashMessage()
		{{-- Session Flash Messages  --}}
	@endflashMessage
    <div class="animated fadeIn">
        <div class="row">
           <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('product.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i>Add Product</a>
                    </div>
                    <div class="card-body tagsmanager">                           
                        <div class="table-responsive">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered custom-tabledata">
                                <thead>
                                    <tr>
                                        <th>ID</th>
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
                <h4 class="modal-title">Add Product</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <form id="product">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <label class=" form-control-label">Select Store</label>
                            <select name="user_id" class="user_id form-control">
                                <option value="">Select</option>
                                @foreach($stores as $store)
                                <option value="{{$store->id}}">{{$store->first_name}}</option>
                                @endforeach
                            </select>
                            <span class="error"></span>
                        </div>
                        <div class="col-sm-6">
                            <label class=" form-control-label">Product Name</label>
                            <input type="text" name="name" value="" class="name form-control">
                            <span class="error"></span>
                        </div>
                        <div class="col-sm-6">
                            <label class=" form-control-label">Packet Weight</label>
                            <select name="packet_weight" class="form-control">
                                <option value="250grm">250grm</option>
                                <option value="500grm">500grm</option>
                                <option value="750grm">750grm</option>
                                <option value="1000grm">1000grm</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label class=" form-control-label">Product Price</label>
                            <input type="text" name="price" value="" class="price form-control">
                            <span class="error"></span>
                        </div>
                        <div class="col-sm-6">
                            <label class=" form-control-label">Product Offer Price</label>
                            <input type="text" name="offer_price" value="" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label class=" form-control-label">Is In Stock</label>
                            <select name="is_in_stock" class="form-control">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label class=" form-control-label">Product Type</label>
                            <select name="producttype_id" class="producttype_id form-control">
                                <option value="">Select</option>
                                @foreach($producttypes as $producttype)
                                <option value="{{$producttype->id}}">{{$producttype->name}}</option>
                                @endforeach
                            </select>
                            <span class="error"></span>
                        </div>
                        <div class="col-sm-6">
                            <label class=" form-control-label">Parent Category</label>
                            <select name="parent_category_id" class="parent_category_id form-control">
                                <option value="">Select</option>
                                @foreach($category as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                            <span class="error"></span>
                        </div>
                        <div class="col-sm-6 apppendsubcat">
                            <label class=" form-control-label">Child Category</label>
                            <select name="category_id" class="category_id form-control">
                                <option value="">Select</option>
                            </select>
                            <span class="error"></span>
                        </div>
                        <div class="col-sm-6">
                            <label class=" form-control-label">Image</label>
                            <input type="file" name="image" class="image form-control">
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
    $(document).on('change','.parent_category_id',function(event){
        var id = $(this).val();
        var url = window.app.url+'/admin/product/subcategory/'+id;
        axios.get(url)
          .then(function (response) {
            $('.apppendsubcat').html(response.data);
            //$('#edit_model').modal('toggle').addClass('show');
            
            //return false;
          })
          .catch(function (error) {
            console.log(error);
          });
    })
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
            ajax: '{{url('admin/product_list')}}',
            columns: [
                {data: 'id', name : 'id'},
                {data: 'name', name : 'name'},
                {data: 'status', name : 'status'},
                {data: 'action', name : 'action', className: 'action-btn'}
            ],
        });
    });
    $(document).on('submit', '#product', function (event) {
        event.preventDefault();
        $('.error').empty();
        $('.addLoading').LoadingOverlay("show");
         var formData = new FormData(this);
        axios.post("{{route('product.store')}}", formData).then(function (response) {
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
                $("#product").find("." + key).next("span.error").css({"color" : "red","font-size" : "85%"}).text(value)
            });
        });
    });
    $(document).on('click', "[id^='edit_']", function(){
        var id = $(this).prop('name');
        var url = window.app.url+'/admin/product/'+id+'/edit';
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
    $(document).on('submit', '#product_edit', function (event) {
        event.preventDefault();
        $('.editloading').LoadingOverlay("show");
        $('.error').empty();
        var id = $('[name=id]').val();
        //var url = window.app.url+'/admin/product/'+id;
        var url = window.app.url+'/admin/product/update/'+id;

         var formData = new FormData(this);
        axios.post(url, formData).then(function (response) {
                //$('#edit_model').modal('hide');
                $('.editloading').LoadingOverlay("hide"); 
                setTimeout(function(){
                location.reload();}, 2000);   
        }).catch(function (error) {
            $('.editloading').LoadingOverlay("hide"); 
            $.each(error.response.data.errors, function (key, value) {
                $("#product_edit").find("." + key).next("span.error").css({"color" : "red","font-size" : "85%"}).text(value)
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