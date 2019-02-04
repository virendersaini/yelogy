@extends('admin.layout.app')

@push('title')

JH Packages

@endpush

@push('breadcrumbs')
<li><a href="index.html">Home</a></li>
<li class="active">Add JH Packages</li>
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
             	{{ Form::open(array('route' => 'packages.store', 'id' => 'add-packages','enctype'=>'multipart/form-data','autocomplete'=>'off'))}}  
                <div class="card">
                    <div class="card-header">
                        <h4>Add New package</h4>                            
                    </div> 
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Add Package Image</label>
                                <input type="file" name="packageimage" class="form-control form-control-file" data-rule-required="true">
                            </div>

                            <div class="form-group col-md-4">
                                <label>Add Package Title</label>
                                <input type="text" class="form-control" data-rule-required="true" name="name">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Status</label>
                                <select name="status" class="form-control" data-rule-required="true">
                                    <option value="active">Active</option>
                                    <option value="inactive">inactive</option> 
                                </select>                                   
                            </div>
                            <!-- <div class="form-group col-md-4">
                                <label>Additional Information</label>
                                <input type="text" class="form-control">
                            </div> -->

                            <div class="w-100"></div>

                            <div class="form-group col-md-12">    
                            	<button type="submit" class="btn btn-primary">Save</button>
                                <button type="reset" class="btn btn-danger">Cancel</button>
                            </div>              

                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div><!-- .animated -->

</div> <!-- .content -->


@endsection
@push('scripts')
	<script type="text/javascript">	
		$(document).ready(function() {

			$('#add-packages').validate();            
            
		});
	</script>
@endpush
