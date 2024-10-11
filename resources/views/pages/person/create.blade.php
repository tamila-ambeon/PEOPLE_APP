@extends('templates.PageTemplate')

@section('title', 'Додати людину')
 
@section('content')


<!--------- BREADCRUMBS: ---------->
@include('templates.breadcrumbs', [ 'items' => [
    ["title" => "Головна", "url" => URL::to('/')],
    ["title" => "Список людей", "url" => URL::to('/') . '/people-list'],
    ["title" => "Додати людину:", "url" => null],
]])
<!--------- /BREADCRUMBS ---------->



<!------------------->


<!-- CENTERED COL: --->
<div class="container pt-3 pb-3 d-flex justify-content-center ">
    <div class="col-sm-12 col-md-10 col-lg-8 col-xl-7 p-3 bg-white">


<div class="mb-2">
    @include("templates.form-wrappers.text-wrapper", [
        'title' => "Ім'я:",
        'description' => 'Як звати цю людину?',
        'input_param' => [
            'id' => "name",  //'class' => '',
            'placeholder' => "Ім'я", 
            "minlength" => "1",  "maxlength" => "50", "disabled" => false,
            'value' => ''
         ]
    ])
</div>

<div class="mb-2">
    @include("templates.form-wrappers.text-wrapper", [
        'title' => "Прізвище:",
        'description' => 'Або нікнейм',
        'input_param' => [
            'id' => "surname",  //'class' => '',
            'placeholder' => "Прізвище", 
            "minlength" => "1",  "maxlength" => "50", "disabled" => false,
            'value' => ''
         ]
    ])
</div>

<div class="mb-2">
    @include("templates.form-wrappers.text-wrapper", [
        'title' => "По-батькові:",
        'description' => 'Або нікнейм',
        'input_param' => [
            'id' => "middlename",  //'class' => '',
            'placeholder' => "По-батькові", 
            "minlength" => "1",  "maxlength" => "50", "disabled" => false,
            'value' => ''
         ]
    ])
</div>


<div class="mb-2 d-flex flex-row-reverse">
    @include('forms.button', [
        'id' => 'create', // ідентифікатор кнопки
        'title' => 'Створити', // надпис на кнопці
        'size' => 'middle', // small, middle, big
        'type' => 'green', // green, red, disabled, default
        //'display' => false, // додає клан d-none
        //'icon' => 'spinner' // наразі лише 1 іконка
    ])

    @include('forms.button', [
        'id' => 'handle_request', // ідентифікатор кнопки
        'title' => 'Обробляю запит', // надпис на кнопці
        'size' => 'middle', // small, middle, big
        'type' => 'disabled', // green, red, disabled, default
        'display' => false, // додає клан d-none
        'icon' => 'spinner' // наразі лише 1 іконка
    ])
</div>



<div class="bg-light p-3 mb-3 font-size-14">
    Решту інформації можна заповнити пізніше.
</div>

    </div>
</div>
<!-- /CENTERED COL --->


@endsection


@section('scripts')
<script src="{{URL::to('/')}}/js/create_person/create_form.js"></script>
@endsection