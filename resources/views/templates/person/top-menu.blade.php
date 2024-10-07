<ul class="people-nav nav nav-pills nav-fill border-bottom font-roboto-bold font-size-14 pt-1" style="background: #201e1c;">

    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{URL::to('/')}}/person/{{$person->id}}">Основна інформація</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#">Фотографії 
            <span class="badge text-bg-success">{{$person->photos_count}}</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{URL::to('/')}}/person/{{$person->id}}/stories">Історія стосунків 
            <span class="badge text-bg-success">{{$person->history_count}}</span>
        </a>
    </li>

</ul>