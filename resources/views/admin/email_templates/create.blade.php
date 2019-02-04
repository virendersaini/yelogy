@extends('admin.layout.app')

@push('title')
Create Email Template
@endpush

@push('breadcrumbs')
	<li><a href="index.html">Home</a></li>
	<li class="active">Create New Email Template</li>
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
            <div class="col-md-12 mb-2">                        
                <a href="{{ route('email-templates.index') }}" class="btn btn-primary pull-left mr-2"><i class="fa fa-angle-left"></i> Back</a>            
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h4>Add New Email Template</h4>
                    </div>
                    {{ Form::open(array('route' => 'email-templates.store', 'id' => 'add-staff','autocomplete' => 'off')) }}
                    	@csrf
	                    <div class="card-body">
	                        <div class="row">
	                            <div class="form-group col-md-12">
	                            	{{ Form::label('title', 'Title') }}
	                            	{{ Form::text('title', old('title'), ['class' => 'form-control']) }}
	                            </div>
	                        </div>  
	                        <div class="row">
	                            <div class="form-group col-md-12">
	                            	{{ Form::label('subject', 'Subject') }}
	                            	{{ Form::text('subject', old('subject'), ['class' => 'form-control']) }}
	                            </div>
	                        </div>   
	                        <div class="row">
	                            <div class="form-group col-md-12">
	                            	{{ Form::label('status', 'Status') }}
	                            	{{ Form::radio('status', 1, true) }} Active
	                            	{{ Form::radio('status', 1, false) }} Inactive
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="form-group col-md-12">
	                            	{{ Form::label('content', 'Mail Content') }}
	                            	{{ Form::textarea('content', old('content'), ['class' => 'form-control']) }}
	                            </div>
	                        </div>   
	                        <div class="row">
	                        	<div class="col-sm-12">
	                        		{{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
	                        	</div>
	                        </div>
	                    </div>  
	                {{ Form::close() }}
                 </div>
            </div>
        </div><!-- .animated -->
    </div> <!-- .content -->
</div><!-- /#right-panel -->
@endsection
@push('scripts')
	<script type="text/javascript">	
		$(document).ready(function() {
			$('#add-staff').validate();
			CKEDITOR.replace('content');
		});
	</script>
@endpush
