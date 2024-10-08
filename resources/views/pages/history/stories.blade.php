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
    ["title" => "Історія стосунків", "url" => null],
]])
<!--------- /BREADCRUMBS ---------->


<!-- TOP MENU: --->
@include('templates.person.top-menu', [
    "current" => URL::to('/') . "/person/" . $person->id . '/histories', 
    "person" => $person
])
<!-- /TOP MENU --->

<!--- CONTENT: ---->
<div class="container">
    <div class="add-new-btn-outer d-flex flex-row mt-3 mb-3">
        @include('forms.button', [
            'id' => 'add_new', // ідентифікатор кнопки
            'title' => 'Додати історію', // надпис на кнопці
            'size' => 'middle', // small, middle, big
            'type' => 'green', // green, red, disabled, default
            //'display' => false, // додає клан d-none
            //'icon' => 'spinner' // наразі лише 1 іконка
        ])
    <script>
        // Редірект при кліку на кнопку створення:
        document.getElementById("add_new").onclick = function (event) {
            location.href = "{{URL::to('/')}}/person/{{$person->id}}/stories/create"
        }
    </script>



    </div>
    <div class="bg-white p-3 rounded border mb-3 font-size-12 text-center">Зводити рахунки дуже корисно і потрібно. Пам'ять підводить. Записи покажуть справжню цінність цих стосунків.<br>Кредит довіри до людини залежить від того, наскільки цінними є ці стосунки для мене.</div>
<table class="table font-size-13 border">
    <tr>
        <td class="font-roboto-bold">
            Якість стосунків:
            <br><span class="font-roboto-light font-size-12 fc-secondary">Кредит довіри</span>
        </td>
        <td>
            <div>
                @if($person->relationship_quality > 0) <span class="badge text-bg-success ps-3 pe-3 pt-2 pb-2 font-size-15">{{$person->relationship_quality}}</span> 
                @elseif($person->relationship_quality < 0) <span class="badge text-bg-danger ps-3 pe-3 pt-2 pb-2 font-size-15">{{$person->relationship_quality}}</span>
                @else <span class="badge text-bg-light ps-3 pe-3 pt-2 pb-2 font-size-15">{{$person->relationship_quality}}</span>
                @endif
            </div>
        </td>
    </tr>
</table>

    <div class="content">
        <h2 class="border-bottom pb-2">Історія:</h2>
        @forelse ($histories as $history)
            @include('parts.stories.view_story', $history)
        @empty
            <p>Тут ще немає дописів.</p>
            <p>З кожною людиною у мене є історія стосунків.
                Навіть той факт, що стосунків нема, це теж є історія.</p>
        @endforelse
    </div>

    <div class="container pt-3 d-flex justify-content-center mb-5">
        {{ $histories->links('templates.people-list-pagination') }}
   </div>

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