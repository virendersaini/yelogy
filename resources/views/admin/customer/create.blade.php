@extends('admin.layout.app')

@push('title')

New Vendor

@endpush

@push('breadcrumbs')
<li><a href="index.html">Home</a></li>
<li class="active"> New Vendor </li>
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

<?php $titless = usertitle();?>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12 mb-2">                        
                <a href="{{url('admin/customer')}}" class="btn btn-primary pull-left mr-2"><i class="fa fa-angle-left"></i> Back</a>

                
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="accordion" id="accordionExample">
                    {{ Form::open(array('route' => 'customer.store', 'files' => true))}}
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h4>Vendor Information</h4>
                            </div>  
                             <div>              
                                <div class="card-body">
                                    <fieldset>
                                        <legend>Vendor details:</legend>



                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <?php 
                                                   $store_type = getStorType();
                                                ?>
                                                <label class=" form-control-label">Store Type</label>
                                                <select name="store_type" class="form-control {{ $errors->has('store_type') ? ' is-invalid' : '' }}">
                                                    <option value="">Select</option>
                                                    @if(!empty($store_type))
                                                        @foreach($store_type as $key => $value)
                                                        <option value="{{$key}}">{{$value}}</option>
                                                        @endforeach
                                                    @endif 
                                                </select>
                                                 @if ($errors->has('store_type'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('store_type') }}</strong>
                                                    </span>
                                                @endif 
                                            </div>
                                            <div class="form-group col-md-4">
                                                <?php 
                                                   $deliverTime = getDeliverTime();
                                                ?>
                                                <label class="form-control-label">Deliver Time</label>
                                                <select name="delivery_time" class="form-control {{ $errors->has('delivery_time') ? ' is-invalid' : '' }}">
                                                    <option value="">Select</option>
                                                    @if(!empty($deliverTime))
                                                        @foreach($deliverTime as $keyy => $valuee)
                                                        <option value="{{$keyy}}">{{$valuee}}</option>
                                                        @endforeach
                                                    @endif 
                                                </select>
                                                 @if ($errors->has('delivery_time'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('delivery_time') }}</strong>
                                                    </span>
                                                @endif 
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class=" form-control-label">First Name
                                                <span class="text-danger">*</span></label>
                                                <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}">
                                                @if ($errors->has('first_name'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('first_name') }}</strong>
                                                    </span>
                                                @endif  
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class=" form-control-label">Last Name<span class="text-danger">*</span></label>
                                                <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}">
                                                @if ($errors->has('last_name'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('last_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class=" form-control-label">Mobile<span class="text-danger">*</span></label>
                                                <input type="text" name="mobile" value="{{ old('mobile') }}" class="form-control {{ $errors->has('mobile') ? ' is-invalid' : '' }}">
                                                @if ($errors->has('mobile'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('mobile') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class=" form-control-label">Email<span class="text-danger">*</span></label>
                                                <input type="text" name="email" value="{{ old('email') }}" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}">
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class=" form-control-label">Pincode<span class="text-danger">*</span></label>
                                                <input type="text" name="pincode" value="{{ old('pincode') }}" class="form-control {{ $errors->has('pincode') ? ' is-invalid' : '' }}">
                                                @if ($errors->has('pincode'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('pincode') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class=" form-control-label">Password<span class="text-danger">*</span></label>
                                                <input type="text" name="password" value="{{ old('password') }}" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}">
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-4">
                                            <input type="file" name="image" class="name form-control">
                                            @if ($errors->has('image'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('image') }}</strong>
                                                </span>
                                            @endif
                                       </div>
                                            <div class="form-group col-md-4">
                                                <select name="status" class="form-control">
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                            <!-- <div class="form-group col-md-4">
                                                <label class=" form-control-label">Upload Photo</label>
                                                <input type="file" name="user_profile" class="form-control">
                                            </div> -->
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

@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
            $('.date').datepicker({  
                format: 'dd/mm/yyyy'
            }); 
        });
    $(function(){
        var visitTypeId = [];
        $('.ad_visit').click(function(){
            var visitType = [];
            $('input[type=checkbox][name="type_visit"]:checked').each(function() {
                visitType.push($(this).val());
                visitTypeId.push($(this).attr('data-id')); 
            });
            if($('.visit').val() !== ""){
                visitType.push($('.visit').val());
                $("#tag_type").val()
                otherTag($("#tag_type").val(),$('.visit').val()).then(function (response) {
                    visitTypeId.push([response.data]);
                }).catch(function (error) {
                    console.log(error);
                });
            }
            $("#tag_id").val(visitTypeId);
            $(".type-visit").val(visitType);
            //$('#type-of-visit').modal('hide');
            //$("[class*='modal-backdrop in']").remove();

        });

        $('.add_allergy').click(function(){
            var allergies = [];
            $('input[type=checkbox][name="allergies"]:checked').each(function() {
                allergies.push($(this).val());
            });
            if($('.al_tag').val() !== ""){
                allergies.push($('.al_tag').val());
            }
            $(".phobia").val(allergies);
            $("#allergies .close").click()
            /*$('#allergies').modal("hide");
            $('.modal-backdrop').removeClass('show')*/
        });

        $('.click_bed_tag').click(function(){
            var bedroom = [];
            $('input[type=checkbox][name="bedroom"]:checked').each(function() {
                bedroom.push($(this).val());
            });
            if($('.bed_tag').val() !== ""){
                bedroom.push($('.bed_tag').val());
            }
            $(".bedroom").val(bedroom);
            $('#bedroom').modal("hide").removeClass('show')
        });
    });
    $(document).ready(function(){
        var i = 0;
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
                    return false;
                }).catch(function (error) {
                    console.log(error);
                });
            }
        })
    });
    $(document).on('click', '#btn_remove', function(){  
           var button_id = $(this).attr("name");   
           $('#row_'+button_id+'').remove();  
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
    $(document).on('change', "[id^='special_']", function(){
        var imagefile = $(this)[0].files[0].type;
        var id = $(this).attr("data-id");
        $("#error_"+id).remove();
        if ($.inArray(imagefile, ["image/jpeg","image/png","image/jpg"])) {
            $(this).val("");
            $("#special_"+id).after("<span id='error_"+id+"' style='color:red'>Allow only image.</span>"); 
        }
    });
    function otherTag(type, tagName) {
        return axios.get("{{url('/admin/addTag')}}/"+type+"/"+tagName);
    }

    /*
        bedroom type and bedroom tags managed
    */
    $(document).on('change',".bedroom_number",function(){
        var type = 'bedroom';
        var number = $(this).val();
        if(number==''){
            number=0;
        }
        axios.get("{{url('/admin/tag_manage')}}/"+number+"/"+type).then(function (response) {
            console.log(response)
            $('.append_bed').html(response.data);
            $('.selectpicker').selectpicker();
        }).catch(function (error) {
            console.log(error);
        });
    })
    /*
        bathroom type and bathroom tags managed
    */
    $(document).on('change',".bathroom_number",function(){
        var type = 'bathroom';
        var number = $(this).val();
        if(number==''){
            number=0;
        }
        axios.get("{{url('/admin/tag_manage')}}/"+number+"/"+type).then(function (response) {
            console.log(response)
            $('.append_bath').html(response.data);
             $('.selectpicker').selectpicker();
        }).catch(function (error) {
            console.log(error);
        });
    })
    /*
        living_number type and living_number tags managed
    */
    $(document).on('change',".living_number",function(){
        var type = 'living_room';
        var number = $(this).val();
        if(number==''){
            number=0;
        }
        axios.get("{{url('/admin/tag_manage')}}/"+number+"/"+type).then(function (response) {
            $('.append_living').html(response.data);
             $('.selectpicker').selectpicker();
        }).catch(function (error) {
            console.log(error);
        });
    })

     /*
        kitchen type and kitchen tags managed
    */
    $(document).on('change',".kitchen",function(){
        var type = 'kitchen';
        var number = $(this).val();
        if(number==''){
            number=0;
        }
        axios.get("{{url('/admin/tag_manage')}}/"+number+"/"+type).then(function (response) {
            console.log(response)
            $('.append_kitchen').html(response.data);
             $('.selectpicker').selectpicker();
        }).catch(function (error) {
            console.log(error);
        });
    })

       /*
        study type and study tags managed
    */
    $(document).on('change',".study",function(){
        var type = 'study';
        var number = $(this).val();
        if(number==''){
            number=0;
        }
        axios.get("{{url('/admin/tag_manage')}}/"+number+"/"+type).then(function (response) {
            console.log(response)
            $('.append_study').html(response.data);
             $('.selectpicker').selectpicker();
        }).catch(function (error) {
            console.log(error);
        });
    })
      /*
        stairs type and stairs tags managed
    */
    $(document).on('change',".stairs",function(){
        var type = 'stairs';
        var number = $(this).val();
        if(number==''){
            number=0;
        }
        axios.get("{{url('/admin/tag_manage')}}/"+number+"/"+type).then(function (response) {
            console.log(response)
            $('.append_stairs').html(response.data);
             $('.selectpicker').selectpicker();
        }).catch(function (error) {
            console.log(error);
        });
    })

    /*
        utility_room type and utility_room tags managed
    */
    $(document).on('change',".utility_room",function(){
        var type = 'utility_room';
        var number = $(this).val();
        if(number==''){
            number=0;
        }
        axios.get("{{url('/admin/tag_manage')}}/"+number+"/"+type).then(function (response) {
            console.log(response)
            $('.append_utlity').html(response.data);
             $('.selectpicker').selectpicker();
        }).catch(function (error) {
            console.log(error);
        });
    })
    /*
        hallway type and hallway tags managed
    */
    $(document).on('change',".hallway",function(){
        var type = 'hallway';
        var number = $(this).val();
        if(number==''){
            number=0;
        }
        axios.get("{{url('/admin/tag_manage')}}/"+number+"/"+type).then(function (response) {
            console.log(response)
            $('.append_hallway').html(response.data);
             $('.selectpicker').selectpicker();
        }).catch(function (error) {
            console.log(error);
        });
    })

 /*
        get product list onchage of product type
    */
    $(document).on('change',".product_type",function(){
        var number = $(this).val();
        axios.get("{{url('/admin/productListByProductType')}}/"+number).then(function (response) {
            $('.product_list').html(response.data);
             $('.selectpicker').selectpicker();
        }).catch(function (error) {
            console.log(error);
        });
    })


    
</script>
@endpush