@extends('templates.PageTemplate')

@section('title', 'Пошук людей')
 
@section('content')

<!--------- TITLE: ---------->
@include('templates.header', [
    'title' => 'Пошук людей'
])
<!--------- /TITLE ---------->

<!------------------->
<div class="container-fluid">
  <div class="row">

    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-6 col-xl-6 col-xxl-6">
                @include("templates.person.section-title", [ 
                    'left' => 'Запит: "<span style="color:red;">' . app('request')->input('q') .'</span>"', 
                    'right' => null
                ])
                <div class="p-3">
                    @forelse($people as $person)
                        <div class="mb-2">
                            <a href="{{URL::to('/')}}/person/{{$person->id}}">#{{$person->id}}</a>
                            <a href="{{URL::to('/')}}/person/{{$person->id}}">{{$person->surname}} {{$person->name}} {{$person->middlename}}</a>
                        </div>
                    @empty
                    <div class="mb-2">
                        Нічого не знайденом.
                    </div>
                    @endforelse
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">

            </div>
        </div>
    </div>




  </div>
</div>
<!------------------->
    
@endsection