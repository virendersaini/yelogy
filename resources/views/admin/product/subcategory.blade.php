    <label class=" form-control-label">Child Category</label>
    <select name="subcategory_id" class="category_id form-control">
        <option value="">Select</option>
        @foreach($childcategory as $cate)
        <option value="{{$cate->id}}">{{$cate->name}}</option>
        @endforeach
    </select>
    <span class="error"></span>