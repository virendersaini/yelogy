@if($type == "living_room" && $id>0)
    @for($i=1;$i<=$id;$i++)
    <div class="row">
        <div class="col-sm-2 pr-0">
            <?php $error = $errors->has('number_of_reception') ? 'is-invalid' : '';
            $option = numberType();
             ?> 
            {!!Form::select('number_of_bathroom', $option, $i, ['class' => "living_number form-control pre-select $error"])!!}
            @if ($errors->has('number_of_reception'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('number_of_reception') }}</strong>
                </span>
            @endif 
        </div>
        <div class="col-sm-4 pl-0">
            <select name="reception_type" class="form-control {{ $errors->has('reception_type') ? ' is-invalid' : '' }}">
                <option value="">Living Room Type</option>
                @if(!empty($tagtypeManager))
                    @foreach($tagtypeManager as $key => $tagtype)
                    <option value="{{$tagtype->name}}">{{$tagtype->name}}</option>
                    @endforeach
                @endif 
            </select>
             @if ($errors->has('reception_type'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('reception_type') }}</strong>
                </span>
            @endif 
        </div> 
        <div class="col-sm-6 pl-0">
            <select multiple="multiple" name="reception_tag" class="selectpicker form-control {{ $errors->has('reception_tag') ? ' is-invalid' : '' }}">
                <option value="">Task to be carried out</option>
                @if(!empty($tagManagers))
                    @foreach($tagManagers as $key => $tag)
                    <option value="{{$tag->tag_name}}">{{$tag->tag_name}}</option>
                    @endforeach
                @endif 
            </select>
             @if ($errors->has('reception_tag'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('reception_tag') }}</strong>
                </span>
            @endif 
        </div> 
    </div>
    <br />
    @endfor
    @else
   <div class="row">
    <div class="col-sm-2 pr-0">
        <?php $error = $errors->has('number_of_reception') ? 'is-invalid' : '';
        $option = numberType();
         ?> 
        {!!Form::select('v', $option, null, ['class' => "living_number form-control pre-select $error"])!!}
        @if ($errors->has('number_of_reception'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('number_of_reception') }}</strong>
            </span>
        @endif 
    </div>
    <div class="col-sm-4 pl-0">
        <input value="{{old('reception_type')}}" readonly="readonly" name="reception_type" type="text" placeholder="Living Room Type" class="form-control bedroom {{ $errors->has('reception_type') ? ' is-invalid' : '' }}">
         @if ($errors->has('reception_type'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('reception_type') }}</strong>
            </span>
        @endif 
    </div> 
    <div class="col-sm-6 pl-0">
        <input value="{{old('reception_tag')}}" readonly="readonly" name="reception_tag" type="text" placeholder="Task to be carried out" class="form-control bedroom {{ $errors->has('reception_tag') ? ' is-invalid' : '' }}">
         @if ($errors->has('reception_tag'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('reception_tag') }}</strong>
            </span>
        @endif 
    </div> 
</div>   
@endif
