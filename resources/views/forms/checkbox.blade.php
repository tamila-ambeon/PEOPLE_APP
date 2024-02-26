<!------- Checkbox id#@if(isset($id))id="{{$id}}" @endif: -------->
@if(isset($items))
@if(is_array($items))
    @if(!isset($id)) <?php $tmpName = \Str::random(12);?>  @endif
    @forelse($items as $value => $label)
    <?php $uniqueID = \Str::random(12); ?> 
    <div>
        <input
        type="checkbox"
        id="{{$uniqueID}}"
        @if(isset($class))class="{{$class}} {{$id}}-input"@else  class="{{$id}}-input" @endif
        @if(isset($id))name="{{$id}}" @else name="{{$tmpName}}" @endif
        value="{{$value}}" 
        @if(isset($checked_values)) 
            @if(is_array($checked_values)) 
                @if(in_array($value, $checked_values)) checked @endif 
            @endif
        @endif
        @if(isset($disabled)) @if($disabled) disabled @endif @endif
        >
        <label for="{{$uniqueID}}" class="me-2">{{$label}}</label>
    </div>
    @empty
    @endforelse
@endif 
@endif
<!------- Checkbox id#@if(isset($id))id="{{$id}}" @endif: -------->