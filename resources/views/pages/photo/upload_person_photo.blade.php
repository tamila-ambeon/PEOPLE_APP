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
    ["title" => "Всі фотографії", "url" => URL::to('/') . '/person/' . $person->id . '/photographs'],
    ["title" => "Завантаження фотографій:", "url" => null],
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

@include('forms.hidden', [
    'id' => "file_type", 
    'value' => "photographs"
])

<!--- CONTENT: ---->
<div class="container mt-4 mb-4">

    <div class="d-flex flex-row mt-3 mb-3">
<script src="{{URL::to('/')}}/dropzone/dropzone.min.js"></script>
<link rel="stylesheet" href="{{URL::to('/')}}/dropzone/dropzone.min.css" type="text/css" />

<form action="{{URL::to('')}}/api/files" class="dropzone" id="my-great-dropzone"></form>



    </div>

        <div class="r">Максимальний розмір файлу: 2Мб. Тільки зображення.</div>
    @include("templates.person.section-title", [ 
        'left' => "Назва зображення:", 
        'description' => 'Ця назва буде застосована до всіх вибраних файлів',
        'right' => ''])

    <div class="mb-4">
        @include('forms.text', [
            'id' => "title",  //'class' => '',
            'placeholder' => "Назва зображення", 
            'value' => ''
        ])
    </div>

    @include("templates.person.section-title", [ 
        'left' => "Детальний опис зображення:", 
        'description' => 'Цей опис буде застосований до всіх вибраних файлів',
        'right' => ''])

    <div class="bg-white">
    @include('forms.text-editor', [
        'id' => "content", 
        "readonly" => false, 
        //'value' => ''
    ])
    </div>

    <div class="d-flex flex-row-reverse mt-2">
        @include('forms.button', [
            'id' => 'upload', // ідентифікатор кнопки
            'title' => 'Завантажити', // надпис на кнопці
            'size' => 'middle', // small, middle, big
            'type' => 'green', // green, red, disabled, default
        ])

        @include('forms.button', [
            'id' => 'upload_request', // ідентифікатор кнопки
            'title' => 'Обробляю запит', // надпис на кнопці
            'size' => 'middle', // small, middle, big
            'type' => 'disabled', // green, red, disabled, default
            'display' => false, // додає клан d-none
            'icon' => 'spinner' // наразі лише 1 іконка
        ])
    </div>

    <div class="ff">
        <p>
            <a href="https://docs.dropzone.dev/">https://docs.dropzone.dev</a>
        </p>
    </div>
</div>
<!--- /CONTENT ---->

<script src="{{URL::to('/')}}/js/files/dropzone.js"></script>



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