<div id="top-menu">

    @if( (URL::to('/') . "/person/" . $person->id) == $current)
        <div class="top-menu-item-active">Основна інформація</div>
    @else 
        <div class="top-menu-item">
            <a href="{{URL::to('/')}}/person/{{$person->id}}">Основна інформація</a>
        </div>  
    @endif

    
    @if( (URL::to('/') . "/person/" . $person->id . "/photographs") == $current)
        <div class="top-menu-item-active">
            <a href="{{URL::to('/')}}/person/{{$person->id}}/photographs">Фотографії ({{$person->photos_count}})</a>
            </div>
    @else 
        <div class="top-menu-item">
            <a href="{{URL::to('/')}}/person/{{$person->id}}/photographs">Фотографії ({{$person->photos_count}})</a>
        </div>
    @endif
  

    @if( (URL::to('/') . "/person/" . $person->id) . "/histories" == $current)
        <div class="top-menu-item-active">
            <a href="{{URL::to('/')}}/person/{{$person->id}}/histories">Історія стосунків ({{$person->history_count}})</a>
        </div>
    @else 
        <div class="top-menu-item">
            <a href="{{URL::to('/')}}/person/{{$person->id}}/histories">Історія стосунків ({{$person->history_count}})</a>
        </div>
    @endif

</div>