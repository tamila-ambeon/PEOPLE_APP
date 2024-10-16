<div class="font-size-13 d-flex justify-content-between">
    <div class="">
        <a href="{{URL::to('/')}}/person/{{$item->id}}">{{trim(implode(" ",[$item->surname, $item->name, $item->middlename]))}}</a>
    </div>
    <div>
        @forelse($fields as $field)
        {{$item->$field}}
        @empty
        @endforelse
    </div>
</div>