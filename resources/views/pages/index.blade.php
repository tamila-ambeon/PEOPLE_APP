@extends('templates.PageTemplate')

@section('title', 'Люди')
 
@section('content')

<!--------- BREADCRUMBS: ---------->
@include('templates.breadcrumbs', [ 'items' => [
    ["title" => "Головна", "url" => URL::to('/')],
    ["title" => "Список людей", "url" => URL::to('/') . '/people-list'],
    ["title" => "Dashboard", "url" => null],
]])
<!--------- /BREADCRUMBS ---------->

<!------------------->
<div class="container-fluid">
  <div class="row">

    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                @include("templates.person.section-title", [ 
                    'left' => 'Ближній круг:', 
                    'description' => 'Ті, про кого треба думати',
                    'right' => null
                ])
                <div class="rounded bg-white pb-3 pt-3">
                    <div>
                        @forelse($closePeople as $person)
                        <div class="ps-2 pe-2">
                            <a href="{{URL::to('/')}}/person/{{$person->id}}">{{$person->surname}} {{$person->name}}</a>
                        </div>
                        @empty
                            <div class="ps-2 pe-2">Нема таких людей.</div>
                        @endforelse

                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                @include("templates.person.section-title", [ 
                    'left' => 'Дальній круг:', 
                    'description' => 'Ті, про кого я змушений думати',
                    'right' => null
                ]) 

                <div class="rounded bg-white pb-3 pt-3">
                    <div>
                        @forelse($farPeople as $person)
                        <div class="ps-2 pe-2">
                            <a href="{{URL::to('/')}}/person/{{$person->id}}">{{$person->surname}} {{$person->name}}</a>
                        </div>
                        @empty
                        <div class="ps-2 pe-2">Нема таких людей.</div>
                        @endforelse
    
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                @include("templates.person.section-title", [ 
                    'left' => 'Чужі, вороги:', 
                    'description' => 'Ті, кого слід уникати, з ким не можна мати справи, щоб не постраждати',
                    'right' => null
                ]) 
                <div class="rounded bg-white pb-3 pt-3">
                    <div>
                        @forelse($enemyPeople as $person)
                        <div class="ps-2 pe-2">
                            <a href="{{URL::to('/')}}/person/{{$person->id}}">{{$person->surname}} {{$person->name}}</a>
                        </div>
                        @empty
                        <div class="ps-2 pe-2">Нема таких людей.</div>
                        @endforelse
    
                    </div>
                </div>
            </div>
        </div>
    </div>




  </div>
</div>
<!------------------->
    
@endsection