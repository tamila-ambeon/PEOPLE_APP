@extends('templates.PageTemplate')

@section('title', "Додати ознаку" )

@section('content')


<!--------- TITLE: ---------->
@include('templates.header', [
    'title' => "Додати ознаку"
])
<!--------- /TITLE ---------->

<!--------- BREADCRUMBS: ---------->
@include('templates.breadcrumbs', [ 'items' => [
    ["title" => "Головна", "url" => URL::to('/')],
    ["title" => "Список ознак", "url" => URL::to('/') . '/signs-list'],
    ["title" => "Додати ознаку:", "url" => null],
]])
<!--------- /BREADCRUMBS ---------->



<div class="container mt-4 mb-4 pt-3 pb-3">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">

            @include("templates.person.section-title", [ 'left' => "Чоловіча назва ознаки:", 'right' => ''])

            <div class="mb-2">
                @include('forms.text', [
                    'id' => "title_men", 
                    'placeholder' => "Чоловіча назва", 
                    'value' => ''
                ]) 
            </div>

            @include("templates.person.section-title", [ 'left' => "Жіноча назва ознаки:", 'right' => ''])

            <div class="mb-2">
                @include('forms.text', [
                    'id' => "title_women", 
                    'placeholder' => "Жіноча назва", 
                    'value' => ''
                ]) 
            </div>

            @include("templates.person.section-title", [ 'left' => "Короткий опис одним реченням:", 'right' => ''])

            <div class="mb-2">
                @include('forms.text', [
                    'id' => "short_description", 
                    'placeholder' => "Короткий опис одним реченням", 
                    'value' => ''
                ]) 
            </div>

        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
            
            @include("templates.person.section-title", [ 'left' => "Тип ознаки:", 'right' => ''])

            <div class="mb-2">
            @include('forms.select', [
                'id' => "type_id",  
                'items' => [-1 => "Негативна", 0 => "Нейтральна", 1 => 'Позитивна'],
                "disabled" => false,
                'selected_value' => 0
            ])
            </div>
            
            @include("templates.person.section-title", [ 'left' => "ID іконки 32х32:", 'right' => ''])
            <div class="mb-2">
                @include('forms.number', [
                    'id' => "icon_id", //'class' => '',
                    'placeholder' => "ID іконки 32х32", 
                    "min" => "0", "step" => "1",
                    'value' => 0
                ])
            
            </div>
            
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12"> 

            @include("templates.person.section-title", [ 'left' => "	Детальний опис ознаки:", 'right' => ''])

            <div class="bg-white">
                @include('forms.text-editor', [
                    'id' => "full_description", 
                    "readonly" => false, 
                    //'value' => ''
                ])
            </div>

        </div>
    </div>  
    
    <div class="row mt-4">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12"> 

            <div class="d-flex flex-row-reverse">
                @include('forms.button', [
                    'id' => 'create_sign', // ідентифікатор кнопки
                    'title' => 'Створити', // надпис на кнопці
                    'size' => 'middle', // small, middle, big
                    'type' => 'green', // green, red, disabled, default
                    //'display' => false, // додає клан d-none
                    //'icon' => 'spinner' // наразі лише 1 іконка
                ])

                @include('forms.button', [
                    'id' => 'create_sign_request', // ідентифікатор кнопки
                    'title' => 'Обробляю запит', // надпис на кнопці
                    'size' => 'middle', // small, middle, big
                    'type' => 'disabled', // green, red, disabled, default
                    'display' => false, // додає клан d-none
                    'icon' => 'spinner' // наразі лише 1 іконка
                ])
            </div>

        </div>
    </div>  

</div>

<script src="{{URL::to('/')}}/js/signs/create-sign.js"></script>

@endsection