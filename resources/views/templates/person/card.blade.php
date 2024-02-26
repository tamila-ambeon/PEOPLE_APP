<!---- PERSONAL CARD: ----->
<div class="personal-card mt-2 mb-2 rounded">

    <!---- AVATAR ----->
    <div class="personal-avatar">
        @if(isset($avatar))
        @else
            <a href="{{URL::to('/')}}/person/{{$id}}"><div class="avatar"><img src="{{URL::to('/')}}/images/no_avatar.jpg"></div></a>
        @endif
    </div>
    <!---- /AVATAR ----->

    <!---- PERSONAL INFO: ----->
    <div class="personal-info">
        <div class="d-flex justify-content-between">

            <div class="me-5">
                <a href="{{URL::to('/')}}/person/{{$id}}">@if(isset($surname)){{$surname}}@endif @if(isset($name)){{$name}}@endif</a> <br>
                <a href="{{URL::to('/')}}/person/{{$id}}">@if(isset($middlename)){{$middlename}}@endif</a>
            </div>

        </div>
    </div>
    <!---- /PERSONAL INFO ----->

</div>
<!---- /PERSONAL CARD ----->
