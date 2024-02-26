<!--- Text input: @if(isset($id))id#{{$id}} @endif --->
<input 
    type="text" 
    @if(isset($id))id="{{$id}}" @endif
    @if(isset($class))class="{{$class}}" @else class="form-control form-control-sm" @endif
    @if(isset($placeholder))placeholder="{{$placeholder}}" @endif
    @if(isset($minlength))minlength="{{$minlength}}" @endif
    @if(isset($maxlength))maxlength="{{$maxlength}}" @endif
    @if(isset($readonly)) @if($readonly) readonly @endif @endif
    @if(isset($disabled)) @if($disabled) disabled @endif @endif
    @if(isset($value))value="{{$value}}" @else value="" @endif
>
<!--- /Text input --->
