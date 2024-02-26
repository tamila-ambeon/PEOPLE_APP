<!------- Select id#@if(isset($id))id="{{$id}}" @endif: -------->
<select class="form-select form-select-sm" @if(isset($id))id="{{$id}}" @endif
@if(isset($disabled)) @if($disabled) disabled @endif @endif
>
    @if(isset($items))
        @if(is_array($items))
            @forelse($items as $key => $value)
                <option @if(isset($selected_value)) @if($selected_value == $key) selected @endif @endif value="{{$key}}">{{$value}}</option>
            @empty
            @endforelse
        @endif 
    @endif 
</select>
<!------- /Select -------->