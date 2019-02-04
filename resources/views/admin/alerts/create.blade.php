@extends('admin.layout.app')

@push('title')
Create Alert
@endpush

@push('breadcrumbs')
	<li><a href="index.html">Home</a></li>
	<li class="active">Create New Alert</li>
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
                        <h4>Add New Alert</h4>
                    </div>
                    {{ Form::open(array('route' => 'alerts.store', 'id' => 'add-alert','autocomplete' => 'off')) }}
                    	@csrf
	                    <div class="card-body">
	                        <div class="row">
	                            <div class="form-group col-md-12">
	                            	{{ Form::label('title', 'Alert Title') }}
	                            	{{ Form::text('title', old('title'), ['class' => 'form-control']) }}
	                            </div>
	                        </div>  
	                        <div class="row">
	                            <div class="form-group col-md-6">
	                            	{{ Form::label('template_type', 'Template Type') }}
	                            	{{ Form::select('template_type', ['email' => 'Email', 'sms' => 'SMS'], 'email',['class' => 'form-control', 'onchange' => 'fetchTemplates(this)']) }}
	                            </div>
	                            <div class="form-group col-md-6">
	                            	{{ Form::label('template', 'Template') }}
	                            	{{ Form::select('template', ['' => 'Select a template'], '',['class' => 'form-control']) }}
	                            </div>
	                        </div>   
	                        <div class="row">
	                            <div class="form-group col-md-6">
	                            	{{ Form::label('fire', 'Fire') }}
	                            	{{ 
	                            		Form::select(
	                            			'fire', 
	                            			['automatic' => 'Automatic', 'trigger' => 'Trigger','reminder' => 'Reminder'], 
	                            			'automatic', 
	                            			['class' => 'form-control', 'onchange' => 'handleFireEvent(this)']
	                            		) 
	                            	}}
	                            </div>
	                            <div class="form-group col-md-6">
	                            	{{ Form::label('event', 'Fire on Event') }}
	                            	{{ 
	                            		Form::select(
	                            			'event', 
	                            			['UserRegistered' => 'User Registered', 'UserLogin' => 'User Login','EmailVerify' => 'Email Verify'], 
	                            			'UserRegistered', 
	                            			['class' => 'form-control', 'onchange' => 'fetchTemplates(this)']
	                            		) 
	                            	}}
	                            </div>
	                        </div>
	                         <div class="row">
	                             <div class="form-group col-md-6" style="display: none" id='reminder_time_holder'>
	                            	{{ Form::label('reminder_time', 'Reminder Time') }}
	                            	{{ Form::text('reminder_time', old('reminder_time'), ['class' => 'form-control']) }}
	                            </div>
	                            <div class="form-group col-md-6" style="display: none" id='notify_to_holder'>
	                            	{{ Form::label('notify_to', 'Notify To') }}
	                            	{{ 
	                            		Form::select(
	                            			'notify_to', 
	                            			['logged_in_user' => 'Logged in user','admin' => 'Admin'], 
	                            			'logged_in_user',
	                            			['class' => 'form-control']
	                            		) 
	                            	}}
	                            </div>
	                            <div style="display: none;" id="users_list_holder" class="col-md-6">
		                            <div class="form-group">
		                            	{{ Form::label('meta[user_group]', 'User Group') }}
		                            	{{ 
		                            		Form::select(
		                            			'meta[user_group]', 
		                            			['customer' => 'Customer','helper' => 'Helper','staff' => 'Staff', 'admin' => 'Admin'], 
		                            			null, 
		                            			['class' => 'form-control','id' => 'users_group']
		                            		) 
		                            	}}
		                            </div>
		                            <div class="form-group">
		                            	{{ Form::label('meta[recipients]', 'Select Users') }}
		                            	{{ 
		                            		Form::select(
		                            			'meta[recipients]', 
		                            			$usersList, 
		                            			null, 
		                            			['class' => 'form-control','multiple' => true, 'id' => 'users_list']
		                            		) 
		                            	}}
		                            </div>
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
@push('style')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />
@endpush
@push('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript">	
		$(document).ready(function() {
			$('#add-alert').validate({
				rules : {
					title: 'required',
					template_type: 'required',
					template: 'required',
					fire: 'required',
					event: 'required',
				}
			});

			$('#reminder_time').datetimepicker();
		});

		var fetchTemplates = function(el){
			axios.get("{{ url('/admin/alerts/fetch-templates') }}/" + el.value)
				.then(function(response){
					$('#template').html(response.data);
				}, function(error){
					console.error(error);
				})
		}

		var handleFireEvent = function(el){
			var fireEventType = el.value;
			var reminderTimeHolder = $('#reminder_time_holder');
			var notifyToHolder = $('#notify_to_holder');
			var usersListHolder = $('#users_list_holder');

			if(fireEventType === 'automatic'){
				reminderTimeHolder.hide();
				notifyToHolder.show();
				usersListHolder.hide();
			}

			if(fireEventType === 'reminder'){
				reminderTimeHolder.show();
				notifyToHolder.hide();
				usersListHolder.show();
			}

			if(fireEventType === 'trigger'){
				reminderTimeHolder.hide();
				notifyToHolder.hide();
				usersListHolder.show();
			}
		}

		fetchTemplates($('#template_type').get(0));
		handleFireEvent($('#fire').get(0));


	</script>
@endpush
