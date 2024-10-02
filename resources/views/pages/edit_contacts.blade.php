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
    ["title" => "Редагування контактів:", "url" => null],
]])
<!--------- /BREADCRUMBS ---------->

@include('forms.hidden', [
    'id' => "id", 
    'value' => $person->id
])

<div class="container mt-4 mb-5">
    @include("templates.person.section-title", [ 'left' => 'Редагування контактів:', 'right' => ''])

    <div class="row">
<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
    @include("templates.person.section-title", [ 'left' => "Прізвище:", 'right' => ''])

    <div class="mb-2">
        @include('forms.text', [
            'id' => "surname", 'placeholder' => "Прізвище", 
            'value' => $person->surname
        ])
    </div>

    @include("templates.person.section-title", [ 'left' => "Ім'я:", 'right' => ''])

    <div class="mb-2">
        @include('forms.text', [
            'id' => "name", 'placeholder' => "Ім'я", 
            'value' => $person->name
        ])
    </div>

    @include("templates.person.section-title", [ 'left' => "По-батькові:", 'right' => ''])

    <div class="mb-2">
        @include('forms.text', [
            'id' => "middlename", 'placeholder' => "По-батькові", 
            'value' => $person->middlename
        ])
    </div>

    @include("templates.person.section-title", [ 'left' => 'Гендер:', 'right' => ''])
    <div class="editor mb-2 ms-2">
        @include('forms.radio', [
            'id' => "gender",  
            "disabled" => false,
            'items' => [0 => "Жінка", 1 => "Чоловік"], // [value => label]
            'checked_value' => $person->gender
        ])
    </div>

</div>


<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">

    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
            @include("templates.person.section-title", [ 'left' => "Дата нашого знайомства:", 'right' => ''])
            <div class="editor mb-2 d-flex flex-row">
                @include('forms.date-picker', [
                    'id' => "date_we_met",
                    "disabled" => false,
                    'value' => $person->date_we_met // format: YYYY-MM-DD
                ])
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
            @include("templates.person.section-title", [ 'left' => "Дата народження:", 'right' => ''])
            <div class="editor mb-2 d-flex flex-row">
                @include('forms.date-picker', [
                    'id' => "birth_date",
                    "disabled" => false,
                    'value' => $person->birth_date // format: YYYY-MM-DD
                ])
            </div>
        </div>
    </div>


</div>
</div>  



    <div class="button mb-2">
        <div class="d-flex flex-row-reverse">
            @include('forms.button', [
                'id' => 'save_contacts', // ідентифікатор кнопки
                'title' => 'Зберегти', // надпис на кнопці
                'size' => 'big', // small, middle, big
                'type' => 'green', // green, red, disabled, default
                //'display' => false, // додає клан d-none
                //'icon' => 'spinner' // наразі лише 1 іконка
            ]) 

            @include('forms.button', [
                'id' => 'handle_request_contacts', // ідентифікатор кнопки
                'title' => 'Обробляю запит', // надпис на кнопці
                'size' => 'big', // small, middle, big
                'type' => 'disabled', // green, red, disabled, default
                'display' => false, // додає клан d-none
                'icon' => 'spinner' // наразі лише 1 іконка
            ])
        </div>
    </div>

</div>

<script src="{{URL::to('/')}}/js/person/contacts.js"></script>


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