<!--- Number input: @if(isset($id))id#{{$id}} @endif --->
<input 
    type="number" 
    @if(isset($id))id="{{$id}}" @endif
    @if(isset($class))class="{{$class}}" @else class="form-control form-control-sm" @endif
    @if(isset($placeholder))placeholder="{{$placeholder}}" @endif
    @if(isset($min))min="{{$min}}" @endif
    @if(isset($max))max="{{$max}}" @endif
    @if(isset($step))step="{{$step}}" @endif
    @if(isset($disabled)) @if($disabled) disabled @endif @endif
    @if(isset($value))value="{{$value}}" @else value="" @endif
>
<!--- /Number input --->