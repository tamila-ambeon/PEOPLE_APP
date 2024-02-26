<!----- Datetime Picker @if(isset($id))id#{{$id}} @endif: ----->
<div>
    <input 
        type="datetime-local"
        @if(isset($id))id="{{$id}}" @endif 
        @if(isset($class))class="{{$class}}" @else class="form-control form-control-sm" @endif
        @if(isset($disabled)) @if($disabled) disabled @endif @endif
        @if(isset($value))value="{{$value}}" @else value="" @endif
    >
</div>
<!----- /Datetime Picker @if(isset($id))id#{{$id}} @endif ----->