@extends('admin.layout.app')

@push('title')

Create Tag

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
            <div class="col-md-12 mb-2">                        
                <a href="javascript:void(0)" onclick="return window.history.back();" class="btn btn-primary pull-left mr-2"><i class="fa fa-angle-left"></i> Back</a>
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
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h4>Add Tag</h4>
                    </div>
                    {{ Form::open(array('route' => 'tag-manager.store', "id" => "tags"))}}                                           
	                    <div class="card-body">
	                    	<!-- <div class="row">
	                            <div class="form-group col-md-4">
	                                <label class=" form-control-label">Tag Type</label>
	                                <?php //$error = $errors->has('tag_type') ? 'is-invalid' : ''; 
	                                	$option = houseTagsType();
	                                ?> 
	                                {!!Form::select('tag_type', $option, null, ['class' => "form-control tag_type_0"])!!}
	                                <span class="error error_0"></span>
	                            </div>
	                            
	                        </div> -->
	                        <input type="hidden" name="type" value="{{$queryString['type']}}">
	                        <input type="hidden" name="map_type" value="{{$queryString['map']}}">
	                        <?php 
	                        if(request()->query('key') == 'type'){
	                        	$label = "Tag Type";
	                        	$name = "name[]";
	                        	$class = "name";
	                        	$value = old('name');
	                        	//echo $label;die;
	                        }else{
	                        	$label = "Tag Name";
	                        	$name = "name[]";
	                        	$class = "name";
	                        	$value = old('name');
	                        ?>
	                        <div class="row">
	                            <div class="form-group col-md-4">
	                                <label class=" form-control-label">Select Tag Type</label>
	                                {!!Form::select('tagtype_manager_id', [null=>'Please Select'] + $tags_manager, null, ['class' => "form-control"])!!}
	                            </div>
	                        </div>
	                        <?php } ?>
	                        <input type="hidden" name="label_name" id="label_name" value="{{$label}}">
	                        <div class="row next">
	                            <div class="form-group col-md-4">
	                                <label class=" form-control-label">{{$label}}</label>
	                                <input type="text" name="{{$name}}" value="{{$value}}" class="form-control {{$class}}_0">
	                                <span class="error error_0"></span>
	                            </div>
	                            <div class="form-group col-md-1">
		                            <button style="margin: 30px 0px 0px 0px;" type="button" name="add" id="add" class="btn btn-success " title="Add More"><i class="fa fa-plus-circle"></i></button>
		                            <div class="d-flex w-100"></div>
		                        </div>
	                        </div>
	                        
	                        <div class="row">
	                            <div class="form-group col-md-12">
	                                <div class="row">
	                                   <div class="form-group col-md-12">
	                                       <button type="submit"  class="btn btn-primary addLoading">Save</button>
	                                       <button type="submit"  class="btn btn-danger">Cancel</button>
	                                   </div>
	                               </div>   
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
			$('.date').datepicker({  
				format: 'yyyy-mm-dd'
			});
			var i=0;
			$("#add").click(function() {
				i++;
				$('.next').after('<div class="row" id="row_'+i+'"><div class="form-group col-md-4"><label class=" form-control-label">'+$("#label_name").val()+'</label><input type="text" name="name[]" class="form-control name_'+i+'"><span class="error error_'+i+'"></span></div><div class="form-group col-md-1"><button style="margin: 30px 0px 0px 0px;" type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove" title="Remove"><i class="fa fa-trash" aria-hidden="true"></i></button><div class="d-flex w-100"></div></div>');
			});
			$(document).on('click', '.btn_remove', function(){  
	           	var button_id = $(this).attr("id");   
	           	$('#row_'+button_id+'').remove();  
	      	}); 
		
			$(document).on('submit', '#tags', function (event) {
		        event.preventDefault();
		        $('.error').empty();
		        $('.addLoading').LoadingOverlay("show");
		        axios.post("{{route('tag-manager.store')}}", $(this).serialize()).then(function (response) {
		        	console.log(response);
		           $('.addLoading').LoadingOverlay("hide");
		            if(response.data.error){
		            	$.each(response.data.error, function (key, value) {
		            		console.log(key);
			            	var split = key.split(".");
			            	if(typeof split[1] === "undefined"){
			            		var valid = 0;
			            	}else{
			            		 valid = split[1];
			            	}
			                $("#tags").find("."+split[0]+'_'+valid).next("span.error_"+valid).css({"color" : "red","font-size" : "85%"}).text(value);
			            });
			            return false;
		            }
		            if (response.data.status) {
		                $.notify(response.data.message, "success");
		                setTimeout(function(){
		                    location.reload();}, 2000);

		                return false;
		            }else{
		                $.notify(response.data.message, "error");
		                return false;
		            }            
		        }).catch(function (error) {
		        });
	        });
	    });

	</script>
@endpush
