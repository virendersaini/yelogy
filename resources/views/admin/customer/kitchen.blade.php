@if($type == "kitchen" && $id>0)
    @for($i=1;$i<=$id;$i++)
    <div class="row">
        <div class="col-sm-2 pr-0">
            <?php $error = $errors->has('number_of_kitchen') ? 'is-invalid' : '';
            $option = numberType();
             ?> 
            {!!Form::select('number_of_kitchen', $option, $i, ['class' => "kitchen form-control pre-select $error"])!!}
            @if ($errors->has('number_of_kitchen'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('number_of_kitchen') }}</strong>
                </span>
            @endif 
        </div>
        <div class="col-sm-4 pl-0">
            <select name="kitchen_type" class="form-control {{ $errors->has('kitchen_type') ? ' is-invalid' : '' }}">
                <option value="">Kitchen Type</option>
                @if(!empty($tagtypeManager))
                    @foreach($tagtypeManager as $key => $tagtype)
                    <option value="{{$tagtype->name}}">{{$tagtype->name}}</option>
                    @endforeach
                @endif 
            </select>
             @if ($errors->has('kitchen_type'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('kitchen_type') }}</strong>
                </span>
            @endif 
        </div> 
        <div class="col-sm-6 pl-0">
            <select multiple="multiple" name="kitchen_tag[]" class="selectpicker form-control {{ $errors->has('kitchen_tag') ? ' is-invalid' : '' }}">
                <option value="">Task to be carried out</option>
                @if(!empty($tagManagers))
                    @foreach($tagManagers as $key => $tag)
                    <option value="{{$tag->tag_name}}">{{$tag->tag_name}}</option>
                    @endforeach
                @endif 
            </select>
             @if ($errors->has('kitchen_tag'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('kitchen_tag') }}</strong>
                </span>
            @endif 
        </div> 
    </div>
    <br />
    @endfor
    @else
    <div class="row">
    <div class="col-sm-2 pr-0">
        <?php $error = $errors->has('number_of_kitchen') ? 'is-invalid' : '';
        $option = numberType();
         ?> 
        {!!Form::select('v', $option, null, ['class' => "kitchen form-control pre-select $error"])!!}
        @if ($errors->has('number_of_kitchen'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('number_of_kitchen') }}</strong>
            </span>
        @endif 
    </div>
    <div class="col-sm-4 pl-0">
        <input value="{{old('kitchen_type')}}" readonly="readonly" name="kitchen_type" type="text" placeholder="Kitchen Type" class="form-control bedroom {{ $errors->has('kitchen_type') ? ' is-invalid' : '' }}">
         @if ($errors->has('kitchen_type'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('kitchen_type') }}</strong>
            </span>
        @endif 
    </div> 
    <div class="col-sm-6 pl-0">
        <input value="{{old('kitchen_tag')}}" readonly="readonly" name="kitchen_tag" type="text" placeholder="Task to be carried out" class="form-control bedroom {{ $errors->has('kitchen_tag') ? ' is-invalid' : '' }}">
         @if ($errors->has('kitchen_tag'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('kitchen_tag') }}</strong>
            </span>
        @endif 
    </div> 
</div> 
@endif
