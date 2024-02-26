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


<!--------- TITLE: ---------->
@include('templates.header', [
    'title' => $person->surname ." ". $person->name
])
<!--------- /TITLE ---------->


<!--------- BREADCRUMBS: ---------->
@include('templates.breadcrumbs', [ 'items' => [
    ["title" => "Головна", "url" => URL::to('/')],
    ["title" => "Список людей", "url" => URL::to('/') . '/people-list'],
    ["title" => $person->surname ." ". $person->name ." ". $person->middlename, "url" => URL::to('/') . '/person/' . $person->id],
    ["title" => "Редагування усіх інших відомостей про людину:", "url" => null],
]])
<!--------- /BREADCRUMBS ---------->

@include('forms.hidden', [
    'id' => "id", 
    'value' => $person->id
])

<div class="container mt-4 mb-5">

    @include("templates.person.section-title", [ 
        'left' => "Усі інші відомості про людину:", 
        'description' => 'Факти про людей дуже цінні',
        'right' => ''])

    <div class="editor mt-2 bg-white">
        @include('forms.text-editor', [
            'id' => "other_info", 
            "readonly" => false, 
            'value' => $person->other_info
        ])
    </div>

    @include("templates.person.section-title", [ 'left' => "Які є слабкості:", 'right' => ''])
    <div class="editor mt-2 bg-white">
        @include('forms.text-editor', [
            'id' => "weaknesses", 
            "readonly" => false, 
            'value' => $person->weaknesses
        ])
    </div>


    

    <div class="button mt-2">
        <div class="d-flex flex-row-reverse">
            @include('forms.button', [
                'id' => 'save', // ідентифікатор кнопки
                'title' => 'Зберегти', // надпис на кнопці
                'size' => 'big', // small, middle, big
                'type' => 'green', // green, red, disabled, default
                //'display' => false, // додає клан d-none
                //'icon' => 'spinner' // наразі лише 1 іконка
            ]) 

            @include('forms.button', [
                'id' => 'handle_request', // ідентифікатор кнопки
                'title' => 'Обробляю запит', // надпис на кнопці
                'size' => 'big', // small, middle, big
                'type' => 'disabled', // green, red, disabled, default
                'display' => false, // додає клан d-none
                'icon' => 'spinner' // наразі лише 1 іконка
            ])
        </div>
    </div>

</div>

<script src="{{URL::to('/')}}/js/person/other-info.js"></script>


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