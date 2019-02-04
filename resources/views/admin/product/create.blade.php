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
                    {{ Form::open(array('route' => 'product.store', 'files' => true))}}
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h4>Product Information</h4>
                            </div>  
                             <div>              
                <div class="card-body">
                    <fieldset>
                        <legend>Product details:</legend>
                         <div class="row">
                        
                        <div class="col-sm-6">
                            <label class=" form-control-label">Product Name</label>
                            <input type="text" name="name" value="" class="name form-control">
                            <span class="error"></span>
                        </div>
                        <div class="col-sm-6">
                            <label class=" form-control-label">Select Store</label>
                            <select name="user_id" class="user_id form-control">
                                <option value="">Select</option>
                                @foreach($stores as $store)
                                <option value="{{$store->id}}">{{$store->name}}</option>
                                @endforeach
                            </select>
                            <span class="error"></span>
                        </div>
                        <div class="col-sm-6">
                            <label class=" form-control-label">Select brand</label>
                            <select name="brand_id" class="producttype_id form-control">
                                <option value="">Select</option>
                                @foreach($producttypes as $producttype)
                                <option value="{{$producttype->id}}">{{$producttype->name}}</option>
                                @endforeach
                            </select>
                            <span class="error"></span>
                        </div>
                        <div class="col-sm-6">
                            <label class=" form-control-label">Parent Category</label>
                            <select name="category_id" class="parent_category_id form-control">
                                <option value="">Select</option>
                                @foreach($category as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                            <span class="error"></span>
                        </div>
                        <div class="col-sm-6 apppendsubcat">
                            <label class=" form-control-label">Child Category</label>
                            <select name="subcategory_id" class="category_id form-control">
                                <option value="">Select</option>
                            </select>
                            <span class="error"></span>
                        </div>
                    </div>
                        <fieldset>
                        <legend>Add packages:</legend>
                        <div class="row">
                         <div class="col-sm-12 next">  
                            <div class="d-flex row addimage"> 
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <button style="margin: 30px 0px 0px 0px;" type="button" name="add" id="add" class="btn btn-success pull-right" title="Add More"><i class="fa fa-plus-circle"></i></button></td>
                        </div>
                    </fieldset>
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
            if($('#image_'+valid).val() === ""){
                $('#image_'+valid).css({'border':'1px solid red'});
                i = valid;
                return false;
            } else if($('#packet_weight_'+valid).val() === ""){
                $('#packet_weight_'+valid).css({'border':'1px solid red'});
                i = valid;
                return false;
            } else if($('#price_'+valid).val() === ""){
                $('#price_'+valid).css({'border':'1px solid red'});
                i = valid;
                return false;
            } else if($('#offer_price_'+valid).val() === ""){
                $('#offer_price_'+valid).css({'border':'1px solid red'});
                i = valid;
                return false;
            } else if($('#is_in_stock_'+valid).val() === ""){
                $('#is_in_stock_'+valid).css({'border':'1px solid red'});
                i = valid;
                return false;
            } else{
                addMore(i, add_more);
                axios.get("{{url('/admin/add-more')}}/"+valid+"/image").then(function (response) {
                    $('.addimage').append(response.data);
                    var files = $("#image_"+valid)[0].files[0];
                    var packet_weight = $("#packet_weight_"+valid).val();
                    $(".packet_weight_"+valid).text(packet_weight);
                    var price = $("#price_"+valid).val();
                    $(".price_"+valid).text(price); 

                    var offer_price = $("#offer_price_"+valid).val();
                    $(".offer_price_"+valid).text(offer_price); 

                    var is_in_stock = $("#is_in_stock_"+valid).val();
                    $(".is_in_stock_"+valid).text(is_in_stock);

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
    $(document).on('change', "[id^='image_']", function(){
        var imagefile = $(this)[0].files[0].type;
        var id = $(this).attr("data-id");
        $("#error_"+id).remove();
        if ($.inArray(imagefile, ["image/jpeg","image/png","image/jpg"])) {
            $(this).val("");
            $("#image_"+id).after("<span id='error_"+id+"' style='color:red'>Allow only image.</span>"); 
        }
    });

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
</script>
@endpush