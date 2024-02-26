<!--- Textarea input: @if(isset($id))id#{{$id}} @endif --->
<textarea autocomplete="off"
    @if(isset($id))id="{{$id}}" @endif
    @if(isset($class))class="{{$class}}" @else class="form-control form-control-sm" @endif
    @if(isset($disabled)) @if($disabled) disabled @endif @endif
    @if(isset($placeholder))placeholder="{{$placeholder}}" @endif
    @if(isset($minlength))minlength="{{$minlength}}" @endif
    @if(isset($maxlength))maxlength="{{$maxlength}}" @endif
    @if(isset($rows))rows="{{$rows}}" @endif
    @if(isset($cols))cols="{{$cols}}" @endif
>
@if(isset($value)){{$value}} @endif
</textarea>
<!--- /Textarea input: @if(isset($id))id#{{$id}} @endif --->