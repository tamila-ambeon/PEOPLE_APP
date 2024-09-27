@extends('templates.PageTemplate')

<!-- TITLE: -->
@if($person != null) 
@section('title', $person->surname . " ". $person->name  )
@else 
@section('title', "404" )
@endif
<!-- /TITLE -->


@if($person != null) 

<!--- CONTENT: -->
@section('content')



<!--------- BREADCRUMBS: ---------->
@include('templates.breadcrumbs', [ 'items' => [
    ["title" => "Головна", "url" => URL::to('/')],
    ["title" => "Список людей", "url" => URL::to('/') . '/people-list'],
    ["title" => $person->surname ." ". $person->name ." ". $person->middlename, "url" => URL::to('/') . '/person/' . $person->id],
    ["title" => "Редагування резюме:", "url" => null],
]])
<!--------- /BREADCRUMBS ---------->

@include('forms.hidden', [
    'id' => "id", 
    'value' => $person->id
])

@include('forms.hidden', [
    'id' => "avatar_id", 
    'value' => 0
])

<div class="container mt-4 mb-5">
    @include("templates.person.section-title", [ 
        'left' => 'Резюме:', 
        'description' => 'Коротко про те, як взаємодіяти з цією людиною',
        'right' => null
    ])



    <div class="editor mt-2 bg-white">
        @include('forms.text-editor', [
            'id' => "resume", 
            "readonly" => false, 
            'value' => $person->resume
        ])
    </div>

    <div class="button mt-2">
        <div class="d-flex flex-row-reverse">
            @include('forms.button', [
                'id' => 'save_resume', // ідентифікатор кнопки
                'title' => 'Зберегти', // надпис на кнопці
                'size' => 'big', // small, middle, big
                'type' => 'green', // green, red, disabled, default
                //'display' => false, // додає клан d-none
                //'icon' => 'spinner' // наразі лише 1 іконка
            ]) 

            @include('forms.button', [
                'id' => 'handle_request_resume', // ідентифікатор кнопки
                'title' => 'Обробляю запит', // надпис на кнопці
                'size' => 'big', // small, middle, big
                'type' => 'disabled', // green, red, disabled, default
                'display' => false, // додає клан d-none
                'icon' => 'spinner' // наразі лише 1 іконка
            ])
        </div>
    </div>

</div>

<script src="{{URL::to('/')}}/js/person/resume.js"></script>


@endsection
<!--- /CONTENT -->

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