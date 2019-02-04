@extends('admin.layout.app')

@push('title')

JH Packages

@endpush

@push('breadcrumbs')
<li><a href="index.html">Home</a></li>
<li class="active">Edit JH Packages</li>
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

@endsection
@push('scripts')
	<script type="text/javascript">	
		$(document).ready(function() {

			$('#add-staff').validate();            
            
		});
	</script>
@endpush
