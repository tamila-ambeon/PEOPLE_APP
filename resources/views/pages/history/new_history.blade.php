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
    ["title" => "Вся історія стосунків", "url" => URL::to('/') . '/person/' . $person->id . '/stories'],
    ["title" => "Додати нову історію", "url" => null],
]])
<!--------- /BREADCRUMBS ---------->


<!-- TOP MENU: --->
@include('templates.person.top-menu', [
    "current" => URL::to('/') . "/person/" . $person->id . '/stories', 
    "person" => $person
])
<!-- /TOP MENU --->

@include('forms.hidden', [
    'id' => "people_id", 
    'value' => $person->id
])



<!--- BLOCK: --->
<div class="container mt-3 mb-3">
    <div class="row">

        <!--- Мета: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3 mb-3">
            <div class="font-roboto-bold font-size-19 mb-1">Дата події:</div>
                <div class="d-flex flex-row">
                    @include('forms.date-picker', [
                        'id' => "date",
                        "disabled" => false,
                        'value' => Carbon\Carbon::now()->toDateString() // format: YYYY-MM-DD
                    ])
                </div>

            <div class="font-roboto-bold font-size-19 mb-1">Оцінка події:</div>
                <div class="d-flex flex-row">
                    @include('forms.select', [
                        'id' => "quality",  
                        'items' => config('people.story_quality'),
                        "disabled" => false,
                        'selected_value' => 0
                    ])
                </div>
            </div>
        <!--- /Мета --->

        <!--- Контент: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9">
            <div class="">
                <div class="mb-3">
                    <div class="font-roboto-bold font-size-19 mb-1">Опис події:</div>

                    <div class="bg-white">
                    @include('forms.text-editor', [
                        'id' => "content", 
                        "readonly" => false, 
                        //'value' => ''
                    ])
                    </div>
                </div>
                
            </div>

            <div class="d-flex flex-row-reverse mb-3">
                @include('forms.button', [
                    'id' => 'create_history', // ідентифікатор кнопки
                    'title' => 'Додати', // надпис на кнопці
                    'size' => 'middle', // small, middle, big
                    'type' => 'green', // green, red, disabled, default
                    //'display' => false, // додає клан d-none
                    //'icon' => 'spinner' // наразі лише 1 іконка
                ])
                @include('forms.button', [
                    'id' => 'create_history_request', // ідентифікатор кнопки
                    'title' => 'Обробляю запит', // надпис на кнопці
                    'size' => 'small', // small, middle, big
                    'type' => 'disabled', // green, red, disabled, default
                    'display' => false, // додає клан d-none
                    'icon' => 'spinner' // наразі лише 1 іконка
                ])
            </div>

        </div>
        <!--- /Контент --->

    </div> 
</div>
<!--- /BLOCK --->









<script src="{{URL::to('/')}}/js/person/create-history.js"></script>

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