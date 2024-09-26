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
            Фотографії ({{$person->photos_count}})
            </div>
    @else 
        <div class="top-menu-item">
            <a href="{{URL::to('/')}}/person/{{$person->id}}/photographs">Фотографії ({{$person->photos_count}})</a>
        </div>
    @endif
  

    @if( (URL::to('/') . "/person/" . $person->id) . "/histories" == $current)
        <div class="top-menu-item-active">
            Історія стосунків ({{$person->history_count}}, {{$person->relationship_quality}})
        </div>
    @else 
        <div class="top-menu-item">
            <a href="{{URL::to('/')}}/person/{{$person->id}}/histories">Історія стосунків ({{$person->history_count}}, {{$person->relationship_quality}})</a>
        </div>
    @endif

</div>