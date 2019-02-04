@if($addmore == "next")
 <div class="col-sm-3 hidde_{{$id}}">
        <label class=" form-control-label">Image</label>
        <input type="file" name="image[]" data-id="{{$id}}" id="image_{{$id}}" value="{{old('image')}} class="orm-control-file form-control">
        <span class="error"></span>
    </div>
    <div class="col-sm-2 hidde_{{$id}}">
        <label class=" form-control-label">Packet Weight</label>
        <select name="packet_weight[]" data-id="{{$id}}" id="packet_weight_{{$id}}" value="{{old('packet_weight')}}" class="form-control">
            <option value="250grm">250grm</option>
            <option value="500grm">500grm</option>
            <option value="750grm">750grm</option>
            <option value="1000grm">1000grm</option>
        </select>
    </div>
    <div class="col-sm-2 hidde_{{$id}}">
        <label class=" form-control-label">Product Price</label>
        <input type="text" name="price[]" data-id="{{$id}}" id="price_{{$id}}" value="{{old('price')}}" class="price form-control">
        <span class="error"></span>
    </div>
    <div class="col-sm-2 hidde_{{$id}}">
        <label class="form-control-label">Product Offer Price</label>
        <input type="text" name="offer_price[]" data-id="{{$id}}" id="offer_price_{{$id}}" value="{{old('offer_price')}}" class="form-control">
    </div>
    <div class="col-sm-2 hidde_{{$id}}">
        <label class="form-control-label">Is In Stock</label>
        <select name="is_in_stock[]" data-id="{{$id}}" id="is_in_stock_{{$id}}" value="{{old('is_in_stock')}}" class="form-control">
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
    </div>
   <!--  <div class="form-group col-md-1">
        <button style="margin: 30px 0px 0px 0px;" type="button" name="{{$id}}" id="btn_remove" class="btn btn-danger pull-right" title="Remove"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
    </div> -->
    <!-- <div class="form-group col-md-4 hidde_{{$id}}">
        <label class=" form-control-label">Special Care Items</label>
        <input type="file" id="special_{{$id}}" data-id="{{$id}}" name="special_care[]" class="form-control-file form-control">
    </div>
    <div class="form-group col-md-4 hidde_{{$id}}">
        <label class=" form-control-label">Special Care Items Name </label>
        <input type="text" id="item_name_{{$id}}" name="item_name[]" value="{{old('item_name')}}" class="form-control">
    </div>
    <div class="form-group col-md-3 hidde_{{$id}}">
        <label class=" form-control-label">Special Care Items Location</label>
        <input type="text" id="item_location_{{$id}}" name="item_location[]" value="{{old('item_location')}}" class="form-control ">
    </div>
    <div class="form-group col-md-1">
        <button style="margin: 30px 0px 0px 0px;" type="button" name="{{$id}}" id="btn_remove" class="btn btn-danger pull-right" title="Remove"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
    </div> -->
@endif
@if($addmore == "image")
    <div class="col-md-4 mb-2 d-flex align-items-center image_remove_{{$id}}" id="image_remove_{{$id}}" data-edit-id="{{$id}}">
        <div class="img-lists">
            <img id="image_ref_{{$id}}" src="images/statue.jpg" class="img-fluid img-thumbnail" alt="img">
        </div>
        <div>
            <h4 class="packet_weight_{{$id}}"></h4>
            <p class="price_{{$id}}"></p>
             <p class="offer_price_{{$id}}"></p>
              <p class="is_in_stock_{{$id}}"></p>
        </div>                                   
    </div>
@endif
