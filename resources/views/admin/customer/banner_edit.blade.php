@extends('admin.layout.app')
@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit vendor <span class="text-success"></span></h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{url('/admin')}}">Home</a></li>
                    <li class="active">Vendor</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12 mb-2">                        
                <a href="{{url('admin/customer')}}" class="btn btn-primary pull-left mr-2"><i class="fa fa-angle-left"></i> Back</a>
                
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="accordion" id="accordionExample">
                	{{ Form::open(array('url' => array('admin/bannerupdate',$customer->id),'enctype'=>'multipart/form-data'))}}
                		{{method_field('PUT')}}
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h4>Customer Information</h4>
                            </div>  
                             <div>              
                                <div class="card-body">
                                     <fieldset>
                                        <legend>Banner details:</legend>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <?php 
                                                   $banner_type = bannerType();
                                                ?>
                                                <label class=" form-control-label">Banner Type</label>
                                                <select name="banner_type" class="form-control {{ $errors->has('banner_type') ? ' is-invalid' : '' }}">
                                                    <option value="">Select</option>
                                                    @if(!empty($banner_type))
                                                        @foreach($banner_type as $key => $value)
                                                        @if($customer->banner_type==$key)
                                                        <option value="{{$key}}" selected="selected">{{$value}}</option>
                                                        @else
                                                        <option value="{{$key}}">{{$value}}</option>
                                                        @endif
                                                        @endforeach
                                                    @endif 
                                                </select>
                                                 @if ($errors->has('banner_type'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('banner_type') }}</strong>
                                                    </span>
                                                @endif 
                                            </div> 
                                            <div class="form-group col-md-4">
                                                <label class=" form-control-label">Products</label>
                                                <select name="product_id" class="form-control {{ $errors->has('product_id') ? ' is-invalid' : '' }}">
                                                    <option value="">Select</option>
                                                    @if(!empty($products))
                                                        @foreach($products as $keyy => $value)
                                                        @if($customer->product_id==$keyy)
                                                        <option value="{{$keyy}}" selected="selected">{{$value}}</option>
                                                        @else
                                                        <option value="{{$keyy}}">{{$value}}</option>
                                                        @endif
                                                        @endforeach
                                                    @endif 
                                                </select>
                                                 @if ($errors->has('product_id'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('product_id') }}</strong>
                                                    </span>
                                                @endif 
                                            </div>                                          
                                            <div class="form-group col-md-4">
                                                <label class=" form-control-label">Banner Image</label>
                                                <input type="file" name="image" class="name form-control">
                                                @if ($errors->has('image'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('image') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-4">
                                                <select name="status" class="form-control">
                                                    <option value="active" selected="{{($customer->status=='active') ? 'selected' : ''}}">Active</option>
                                                    <option value="inactive" selected="{{($customer->status=='inactive') ? 'selected' : ''}}">Inactive</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-group col-md-12">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                                <button type="reset" class="btn btn-danger">Cancel</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                       
                    {{ Form::close() }}
               </div>
          </div>
    </div><!-- .animated -->
</div> <!-- .content -->

<!-- Models -->
<div class="modal fade" id="product-list-model" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-medium" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Product List</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
             <div class="modal-body">
                    <div class="btn-group-toggle select-check" data-toggle="buttons">
                      <label class="btn btn-outline-primary select-tags">
                        <input type="checkbox">Product List 1
                      </label>
                      <label class="btn btn-outline-primary select-tags">
                        <input type="checkbox"> Product List 2
                      </label>
                      <label class="btn btn-outline-primary select-tags">
                        <input type="checkbox"> Product List 3
                      </label>
                      <label class="btn btn-outline-primary select-tags">
                        <input type="checkbox"> Product List 4
                      </label>
                      <label class="btn btn-outline-primary select-tags">
                        <input type="checkbox"> Product List 5
                      </label>
                    </div>

                    <div class="form-group">
                        <label>Others</label>
                        <textarea class="form-control"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>

<!-- Bedroom popup -->
<div class="modal fade" id="bedroom" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Bedroom</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="btn-group-toggle select-check" data-toggle="buttons">
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox">Tidy
                  </label>
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox"> Clean
                  </label>
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox"> Dust
                  </label>
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox"> Hoover
                  </label>
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox"> Mop
                  </label>
                </div>

                <div class="form-group">
                    <label>Others</label>
                    <textarea class="form-control"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Apply</button>
            </div>
        </div>
    </div>
</div>

<!-- Bathroom popup -->
<div class="modal fade" id="bathroom" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Bathroom</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="btn-group-toggle select-check" data-toggle="buttons">
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox">Bathroom 1
                  </label>
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox"> Clean
                  </label>
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox"> Bathroom 2
                  </label>
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox"> Bathroom 3
                  </label>
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox"> Bathroom 4
                  </label>
                </div>

                <div class="form-group">
                    <label>Others</label>
                    <textarea class="form-control"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Apply</button>
            </div>
        </div>
    </div>
</div>

<!-- Reception  popup -->
<div class="modal fade" id="reception" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Reception / Living Room</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="btn-group-toggle select-check" data-toggle="buttons">
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox">Reception  1
                  </label>
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox"> Reception 1a
                  </label>
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox"> Reception  2
                  </label>
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox"> Reception  3
                  </label>
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox"> Reception  4
                  </label>
                </div>
                <div class="form-group">
                    <label>Others</label>
                    <textarea class="form-control"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Apply</button>
            </div>
        </div>
    </div>
</div>

<!-- Kitchen  popup -->
<div class="modal fade" id="kitchen" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Kitchen </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="btn-group-toggle select-check" data-toggle="buttons">
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox">Kitchen  1
                  </label>
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox"> Kitchen 1a
                  </label>
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox"> Kitchen  2
                  </label>
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox"> Kitchen  3
                  </label>
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox"> Kitchen  4
                  </label>
                </div>
                <div class="form-group">
                    <label>Others</label>
                    <textarea class="form-control"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Apply</button>
            </div>
        </div>
    </div>
</div>

<!-- Study  popup -->
<div class="modal fade" id="study" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Study </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="btn-group-toggle select-check" data-toggle="buttons">
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox">Study  1
                  </label>
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox"> Study 1a
                  </label>
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox"> Study  2
                  </label>
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox"> Study  3
                  </label>
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox"> Study  4
                  </label>
                </div>
                <div class="form-group">
                    <label>Others</label>
                    <textarea class="form-control"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Apply</button>
            </div>
        </div>
    </div>
</div>

<!-- Hallway  popup -->
<div class="modal fade" id="hallway" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Hallway & Stairs</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="btn-group-toggle select-check" data-toggle="buttons">
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox">Hallway 1
                  </label>
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox"> Hallway 1a
                  </label>
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox"> Hallway  2
                  </label>
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox"> Hallway  3
                  </label>
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox"> Hallway  4
                  </label>
                </div>
                <div class="form-group">
                    <label>Others</label>
                    <textarea class="form-control"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Apply</button>
            </div>
        </div>
    </div>
</div>

<!-- Utility popup -->
<div class="modal fade" id="utility" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Utility</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="btn-group-toggle select-check" data-toggle="buttons">
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox">Utility 1
                  </label>
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox"> Utility 1a
                  </label>
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox"> Utility  2
                  </label>
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox"> Utility  3
                  </label>
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox"> Utility  4
                  </label>
                </div>
                <div class="form-group">
                    <label>Others</label>
                    <textarea class="form-control"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Apply</button>
            </div>
        </div>
    </div>
</div>

<!-- location popup -->
<div class="modal fade" id="location" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Location of Mop & Bucket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="btn-group-toggle select-check" data-toggle="buttons">
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox">Location of Mop & Bucket 1
                  </label>
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox"> Location of Mop & Bucket 1a
                  </label>
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox"> Location of Mop & Bucket  2
                  </label>
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox"> Location of Mop & Bucket  3
                  </label>
                  <label class="btn btn-primary select-tags">
                    <input type="checkbox"> Location of Mop & Bucket  4
                  </label>
                </div>
                <div class="form-group">
                    <label>Others</label>
                    <textarea class="form-control"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Apply</button>
            </div>
        </div>
    </div>
</div>

<!-- Allergies  popup -->
<div class="modal fade" id="allergies" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Allergies / Phobia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="btn-group-toggle select-check" data-toggle="buttons">
                @if(!empty($tagName))
                    @foreach($tagName as $key => $allergies)
                        @if($allergies->tag_type == "Allergy")
                            <label class="btn btn-primary select-tags">
                                <input name="allergies" class="allergies" type="checkbox" value="{{$allergies->tag_name}}">{{$allergies->tag_name}}
                            </label>
                        @endif
                    @endforeach
                @endif
                </div>
                <div class="form-group">
                    <label>Others</label>
                    <textarea class="form-control  al_tag"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary add_allergy">Apply</button>
            </div>
        </div>
    </div>
</div>

<!-- Type of visit  popup -->
<div class="modal fade" id="type-of-visit" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Type of visit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="btn-group-toggle select-check" data-toggle="buttons">
                @if(!empty($tagName))
                    @foreach($tagName as $key => $typeOfVisit)
                        @if($typeOfVisit->tag_type == "Type of Visit")
                            <input type="hidden" id="tag_type" name="tag_type" value="{{$typeOfVisit->tag_type}}">
                            <label class="btn btn-primary select-tags ">
                                <input name="type_visit" class="type_visit" type="checkbox" data-id="{{$typeOfVisit->id}}" value="{{$typeOfVisit->tag_name}}">{{$typeOfVisit->tag_name}}
                            </label>
                        @endif
                    @endforeach 
                @endif           
                </div>
                <div class="form-group">
                    <label>Others</label>
                    <textarea class="form-control visit"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary ad_visit">Apply</button>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
   $(document).ready(function(){
        var i = $("#last_key").val();

        var add_more = "next";
        addMore(i, add_more);
        $("#add").click(function(){
            i++;
            var valid = i - 1;
            if($('#special_'+valid).val() === ""){
                $('#special_'+valid).css({'border':'1px solid red'});
                i = valid;
                return false;
            } else if($('#item_name_'+valid).val() === ""){
                $('#item_name_'+valid).css({'border':'1px solid red'});
                i = valid;
                return false;
            } else if($('#item_location_'+valid).val() === ""){
                $('#item_location_'+valid).css({'border':'1px solid red'});
                i = valid;
                return false;
            } else{
                addMore(i, add_more);
                axios.get("{{url('/admin/add-more')}}/"+valid+"/image").then(function (response) {
                    $('.addimage').append(response.data);
                    var files = $("#special_"+valid)[0].files[0];
                    var item_name = $("#item_name_"+valid).val();
                    console.log(item_name);
                    $(".itemName_"+valid).text(item_name);
                    var item_location = $("#item_location_"+valid).val();
                    $(".item_loc_"+valid).text(item_location);
                    var img=document.getElementById("image_ref_"+valid); 
                    img.files = files; 
                    var reader = new FileReader();
                    reader.onload = (function(aImg) { 
                        return function(e) { aImg.src = e.target.result; }; 
                    })(img);
                    reader.readAsDataURL(files);
                }).catch(function (error) {
                    console.log(error);
                });
            }
        })
    }); 
    function addMore(countVal, type) {
        var count = countVal - 1;
        axios.get("{{url('/admin/add-more')}}/"+countVal+"/"+type).then(function (response) {
            $(".hidde_"+count).css({"display" : "none"});
            $('.next').after(response.data);
        }).catch(function (error) {
            console.log(error);
        }); 
    }
    
    $(document).on('click', "[id^='image_remove_']", function(){
    	$dataId = $(this).attr('data-edit-id');
    	$(".hidde_"+$dataId).css({"display":"block"});
    });
    $(document).on('change', "[id^='special_']", function(){
        var imagefile = $(this)[0].files[0].type;
        var id = $(this).attr("data-id");
        $("#error_"+id).remove();
        if ($.inArray(imagefile, ["image/jpeg","image/png","image/jpg"])) {
            $(this).val("");
            $("#special_"+id).after("<span id='error_"+id+"' style='color:red'>Allow only image.</span>"); 
        }
    });
</script>
@endpush