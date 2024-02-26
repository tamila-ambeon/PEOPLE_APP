<!--- Hidden input: @if(isset($id))id#{{$id}} @endif --->
<input 
    type="hidden" 
    @if(isset($id))id="{{$id}}" @endif
    @if(isset($value))value="{{$value}}" @else value="" @endif
>
<!--- /Hidden input --->
