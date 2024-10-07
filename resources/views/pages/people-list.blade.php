@extends('templates.PageTemplate')

@section('title', 'Список людей')
 
@section('content')

<!--------- TITLE: ---------->
@include('templates.header', [
    'title' => 'Список людей'
])
<!--------- /TITLE ---------->

<!--------- BREADCRUMBS: ---------->
@include('templates.breadcrumbs', [ 'items' => [
    ["title" => "Головна", "url" => URL::to('/')],
    ["title" => "Список людей:", "url" => null],
]])
<!--------- /BREADCRUMBS ---------->

<div class="container pt-3 d-flex justify-content-center ">
    <div class="col-sm-12 col-md-10 col-lg-8 col-xl-7 ">
    <div class="d-flex flex-row-reverse">
            <!---------------->
            @include('forms.button', [
                'id' => 'go-to-create-person', // ідентифікатор кнопки
                'title' => 'Додати людину', // надпис на кнопці
                'size' => 'big', // small, middle, big
                'type' => 'green', // green, red, disabled, default
                //'display' => false, // додає клан d-none
                //'icon' => 'spinner' // наразі лише 1 іконка
            ])
    </div>
    </div>
</div>
<script>
    // Редірект при кліку на кнопку створення:
    document.getElementById("go-to-create-person").onclick = function (event) {
        location.href = "{{URL::to('/')}}/person/create"
    }
</script>

<div class="container pt-3 d-flex justify-content-center ">
    {{ $people->links('templates.people-list-pagination') }}
</div>

<!-- CENTERED COL: --->
<div class="container d-flex justify-content-center ">
    <div class="col-sm-12 col-md-10 col-lg-8 col-xl-7 ps-3 pe-3 pt-1 pb-1">

        <div class="container p-0 mt-3">
            @forelse($people as $person) 
                <div class="">
                    @include('templates.person.card', $person->toArray())
                </div>
            @empty
                <p>Дописів нема.</p>
            @endforelse
        </div>

    </div>
</div>
    


<div class="container pt-3 d-flex justify-content-center mb-5">
     {{ $people->links('templates.people-list-pagination') }}
</div>


@endsection