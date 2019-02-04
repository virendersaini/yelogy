    <label class=" form-control-label">Product List</label>
    <select multiple="multiple" name="product_list[]" class="selectpicker form-control {{ $errors->has('product_list') ? ' is-invalid' : '' }}">
        <option value="">Product List</option>
        @if(!empty($product_list))
            @foreach($product_list as $key => $product)
            <option value="{{$product->id}}">{{$product->name}}</option>
            @endforeach
        @endif 
    </select>
     @if ($errors->has('product_list'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('product_list') }}</strong>
        </span>
    @endif 
