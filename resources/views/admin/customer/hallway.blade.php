@if($type == "hallway" && $id>0)
    @for($i=1;$i<=$id;$i++)
    <div class="row">
        <div class="col-sm-2 pr-0">
            <?php $error = $errors->has('number_of_hallway') ? 'is-invalid' : '';
            $option = numberType();
             ?> 
            {!!Form::select('number_of_hallway', $option, $i, ['class' => "hallway form-control pre-select $error"])!!}
            @if ($errors->has('number_of_hallway'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('number_of_hallway') }}</strong>
                </span>
            @endif 
        </div>
        <div class="col-sm-4 pl-0">
            <select name="hallway_type" class="form-control {{ $errors->has('hallway_type') ? ' is-invalid' : '' }}">
                <option value="">Hallway Type</option>
                @if(!empty($tagtypeManager))
                    @foreach($tagtypeManager as $key => $tagtype)
                    <option value="{{$tagtype->name}}">{{$tagtype->name}}</option>
                    @endforeach
                @endif 
            </select>
             @if ($errors->has('utility_type'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('utility_type') }}</strong>
                </span>
            @endif 
        </div> 
        <div class="col-sm-6 pl-0">
            <select multiple="multiple" name="hallway_tag[]" class="selectpicker form-control {{ $errors->has('hallway_tag') ? ' is-invalid' : '' }}">
                <option value="">Task to be carried out</option>
                @if(!empty($tagManagers))
                    @foreach($tagManagers as $key => $tag)
                    <option value="{{$tag->tag_name}}">{{$tag->tag_name}}</option>
                    @endforeach
                @endif 
            </select>
             @if ($errors->has('hallway_tag'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('hallway_tag') }}</strong>
                </span>
            @endif 
        </div> 
    </div>
    <br />
    @endfor
    @else
    <div class="row">
    <div class="col-sm-2 pr-0">
        <?php $error = $errors->has('number_of_hallway') ? 'is-invalid' : '';
        $option = numberType();
         ?> 
        {!!Form::select('v', $option, null, ['class' => "hallway form-control pre-select $error"])!!}
        @if ($errors->has('number_of_hallway'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('number_of_hallway') }}</strong>
            </span>
        @endif 
    </div>
    <div class="col-sm-4 pl-0">
        <input value="{{old('hallway_type')}}" readonly="readonly" name="hallway_type" type="text" placeholder="Hallway Type" class="form-control bedroom {{ $errors->has('hallway_type') ? ' is-invalid' : '' }}">
         @if ($errors->has('hallway_type'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('hallway_type') }}</strong>
            </span>
        @endif 
    </div> 
    <div class="col-sm-6 pl-0">
        <input value="{{old('hallway_tag')}}" readonly="readonly" name="hallway_tag" type="text" placeholder="Task to be carried out" class="form-control bedroom {{ $errors->has('hallway_tag') ? ' is-invalid' : '' }}">
         @if ($errors->has('hallway_tag'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('hallway_tag') }}</strong>
            </span>
        @endif 
    </div> 
</div> 
@endif
