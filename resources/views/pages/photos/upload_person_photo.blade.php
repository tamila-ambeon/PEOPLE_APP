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
    ["title" => "Всі фотографії", "url" => URL::to('/') . '/person/' . $person->id . '/photos'],
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

<script src="{{URL::to('/')}}/dropzone/dropzone.min.js"></script>
<link rel="stylesheet" href="{{URL::to('/')}}/dropzone/dropzone.min.css" type="text/css" />




<!--- BLOCK: --->
<div class="container mt-3 mb-3">
    <div class="row">

        <!--- Мета: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">

            <form action="{{URL::to('')}}/api/files" class="dropzone" id="my-great-dropzone"></form>
            <div class="font-size-12">— Тільки зображення.</div>
            <div class="font-size-12">— Максимальний розмір файлу: <span class="font-roboto-bold font-size-14">2 MB</span></div>
            <div class="font-size-12 mb-3">— Файли завантажуться на сервер <span class="font-roboto-bold font-size-14">ПІСЛЯ</span> натискання на кнопку.</div>
            <div class="font-size-12">Документація: <a href="https://docs.dropzone.dev/" target="_blank">https://docs.dropzone.dev</a></div>
        </div>
        <!--- /Мета --->

        <!--- Контент: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9 p-0">
 
            <div class="">

                <div class="font-roboto-bold font-size-19">Назва зображення:</div>
                <div class="font-roboto-light font-size-12 fc-secondary mb-1">Ця назва буде застосована до всіх вибраних файлів</div>

                <div class="mb-4">
                    @include('forms.text', [
                        'id' => "title",  //'class' => '',
                        'placeholder' => "Назва зображення", 
                        'value' => ''
                    ])
                </div>
                
            </div>       

            <div>
            
                <div class="font-roboto-bold font-size-19">Детальний опис зображення:</div>
                <div class="font-roboto-light font-size-12 fc-secondary mb-1">Цей опис буде застосований до всіх вибраних файлів</div>


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

        </div>
        <!--- /Контент --->


    </div> 
</div>
<!--- /BLOCK --->













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