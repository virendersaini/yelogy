<div class="modal-dialog">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Edit Category</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <form id="product_edit" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="row">
                   
                   <div class="col-sm-12">
                     <label class=" form-control-label">Parent Category</label>
                       <select name="parent_id" class="form-control">
                              <option value="0">Select Parent</option>
                                @foreach($producttypes as $producttype)
                                @if($product->parent_id==$producttype->id)
                                <option value="{{$producttype->id}}" selected="selected">{{$producttype->name}}</option>
                                @else
                                <option value="{{$producttype->id}}">{{$producttype->name}}</option>
                                @endif
                                @endforeach
                            </select>
                             <span class="error"></span>
                    </div>
                   <div class="col-sm-12">
                        <label class=" form-control-label">Name</label>
                        <input type="text" name="name" value="{{$product->name}}" class="name form-control">
                        <span class="error"></span>
                   </div>
                   <div class="col-sm-12">
                        <label class=" form-control-label">Image</label>
                        <input type="file" name="image" class="name form-control">
                        <span class="error"></span>
                   </div>
                   <div class="col-sm-12">
                      <input type="hidden" name="id" value="{{$product->id}}">
                        <?php $options = array("active" => "Active", "inactive" => "Inactive") ?>
                       <label for="status" class=" form-control-label">Status</label>
                       {!!Form::select('status', $options, $product->status, ['class' => "form-control status"])!!}
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