<!--- Radio input: @if(isset($id))id#{{$id}} @endif --->
@if(isset($items))
@if(is_array($items))
    @if(!isset($id)) <?php $tmpName = \Str::random(12);?>  @endif
    @forelse($items as $value => $label)
        <?php $uniqueID = \Str::random(12); ?> 
        <div>
            <input 
                type="radio" 
                @if(isset($id))name="{{$id}}" @else name="{{$tmpName}}" @endif
                id="{{$uniqueID}}"
                @if(isset($class))class="{{$class}} {{$id}}-input"@else  class="{{$id}}-input" @endif
                value="{{$value}}" 
                @if(isset($checked_value)) @if($checked_value == $value) checked @endif @endif
                @if(isset($disabled)) @if($disabled) disabled @endif @endif
            >
            <label for="{{$uniqueID}}">{{$label}}</label>
        </div>
    @empty
    @endforelse
@endif 
@endif
<!--- /Radio input: @if(isset($id))id#{{$id}} @endif --->