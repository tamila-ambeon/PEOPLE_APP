@extends('templates.PageTemplate')


@if($person != null) 
@section('title', $person->surname . " ". $person->name  )
@else 
@section('title', "404" )
@endif

@if($person != null) 
@section('content')


<!--------- BREADCRUMBS: ---------->
@include('templates.breadcrumbs', [ 'items' => [
    ["title" => "Головна", "url" => URL::to('/')],
    ["title" => "Список людей", "url" => URL::to('/') . '/people-list'],
    ["title" => $person->surname ." ". $person->name ." ". $person->middlename, "url" => URL::to('/') . '/person/' . $person->id],
    ["title" => "Всі фотографії", "url" => null],
]])
<!--------- /BREADCRUMBS ---------->


<!-- TOP MENU: --->
@include('templates.person.top-menu', [
    "current" => URL::to('/') . "/person/" . $person->id . '/photographs', 
    "person" => $person
])
<!-- /TOP MENU --->

@include('forms.hidden', [
    'id' => "people_id", 
    'value' => $person->id
])

<!--- CONTENT: ---->
<div class="container mt-4 mb-4">

    <div class="d-flex flex-row mt-3 mb-3">
        @include('forms.button', [
            'id' => 'add_new', // ідентифікатор кнопки
            'title' => 'Завантажити фотографії', // надпис на кнопці
            'size' => 'middle', // small, middle, big
            'type' => 'green', // green, red, disabled, default
            //'display' => false, // додає клан d-none
            //'icon' => 'spinner' // наразі лише 1 іконка
        ])
    <script>
        // Редірект при кліку на кнопку створення:
        document.getElementById("add_new").onclick = function (event) {
            location.href = "{{URL::to('/')}}/person/{{$person->id}}/photos/create"
        }
    </script>
    </div>

    @include('pages.photos.list-template', ['files' => $files])

</div>
<!--- /CONTENT ---->


@endsection
@else 

@section('content')
<!--------- TITLE: ---------->
@include('templates.header', [
    'title' => "404"
])
<!--------- /TITLE ---------->
<p>Людини з вказаним ID не зареєстровано.</p>
@endsection

@endif