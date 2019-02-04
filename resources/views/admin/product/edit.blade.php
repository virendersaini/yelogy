<div class="modal-dialog">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Edit Product</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <form id="product_edit">
            <div class="modal-body">
                <div class="row">
                   <div class="col-sm-6">
                            <label class=" form-control-label">Select Store</label>
                            <select name="user_id" class="user_id form-control">
                                <option value="">Select</option>
                                @foreach($stores as $store)
                                @if($store->id==$product->user_id)
                                <option value="{{$store->id}}" selected="selected">{{$store->first_name}}</option>
                                @else
                                <option value="{{$store->id}}">{{$store->first_name}}</option>
                                @endif
                                @endforeach
                            </select>
                            <span class="error"></span>
                        </div>
                   <div class="col-sm-6">
                        <label class=" form-control-label">Product Name</label>
                        <input type="text" name="name" value="{{$product->name}}" class="name form-control">
                        <span class="error"></span>
                   </div>
                   <div class="col-sm-6">
                            <label class=" form-control-label">Packet Weight</label>
                            <select name="packet_weight" class="form-control">
                                <option value="250gram">250gram</option>
                                <option value="500gram">500gram</option>
                                <option value="750gram">750gram</option>
                                <option value="1kg">1kg</option>
                            </select>
                    </div>
                   <div class="col-sm-6">
                            <label class=" form-control-label">Product Price</label>
                            <input type="text" name="price" value="{{$product->price}}" class="price form-control">
                            <span class="error"></span>
                        </div>
                        <div class="col-sm-6">
                            <label class=" form-control-label">Product Offer Price</label>
                            <input type="text" name="offer_price" value="{{$product->offer_price}}" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label class=" form-control-label">Is In Stock</label>
                            <select name="is_in_stock" class="form-control">
                                <option value="1" {{($product->is_in_stock=='yes') ? "selected":''}}>Yes</option>
                                <option value="0" {{($product->is_in_stock=='no') ? "selected":''}}>No</option>
                            </select>
                        </div>
                   <div class="col-sm-6">
                            <label class=" form-control-label">Product Type</label>
                            <select name="producttype_id" class="producttype_id form-control">
                                <option value="">Select</option>
                                @foreach($producttypes as $producttype)
                                @if($producttype->id==$product->producttype_id)
                                <option value="{{$producttype->id}}" selected="selected">{{$producttype->name}}</option>
                                @else
                                <option value="{{$producttype->id}}">{{$producttype->name}}</option>
                                @endif
                                @endforeach
                            </select>
                            <span class="error"></span>
                        </div>
                        <div class="col-sm-6">
                            <label class=" form-control-label">Parent Category</label>
                            <select name="parent_category_id" class="parent_category_id form-control">
                                <option value="">Select</option>
                                @foreach($category as $cat)
                                @if($cat->id==$product->parent_category_id)
                                <option value="{{$cat->id}}" selected="selected">{{$cat->name}}</option>
                                @else
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endif
                                @endforeach
                            </select>
                            <span class="error"></span>
                        </div>
                        <div class="col-sm-6 apppendsubcat">
                            <label class=" form-control-label">Child Category</label>
                            <select name="category_id" class="category_id form-control">
                                <option value="">Select</option>
                                @foreach($childcategory as $cate)
                                @if($cate->id==$product->category_id)
                                <option value="{{$cate->id}}" selected="selected">{{$cate->name}}</option>
                                @else
                                <option value="{{$cate->id}}">{{$cate->name}}</option>
                                @endif
                                @endforeach
                            </select>
                            <span class="error"></span>
                        </div>
                        <div class="col-sm-6">
                      <input type="hidden" name="id" value="{{$product->id}}">
                        <?php $options = array("active" => "Active", "inactive" => "Inactive") ?>
                       <label for="tag_type" class=" form-control-label">Status</label>
                       {!!Form::select('status', $options, $product->status, ['class' => "form-control status"])!!}
                       <span class="error"></span>
                   </div>
                        <div class="col-sm-12">
                            <label class=" form-control-label">Image</label>
                            <input type="file" name="image" class="image form-control">
                            <span class="error"></span>
                        </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-success editloading">Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
</div>