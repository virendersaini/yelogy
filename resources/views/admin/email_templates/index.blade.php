@extends('admin.layout.app')
@push('title') Email Templates @endpush

@push('breadcrumbs')
    <li><a href="{{url('/admin')}}">Home</a></li>
    <li class="active">Email Templates</li>
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
                        <a href="{{route('email-templates.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> Add New Temaplate</a>
                    </div>
                    <div class="card-body">         
                        <div class="table-responsive">
                            {!! $dataTable->table() !!}                  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div> <!-- .content -->

@endsection

@push('scripts')
{!! $dataTable->scripts() !!} 
@endpush