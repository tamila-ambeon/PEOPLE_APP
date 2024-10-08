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
    ["title" => "Редагувати фотографію:", "url" => null],
]])
<!--------- /BREADCRUMBS ---------->


<!-- TOP MENU: --->
@include('templates.person.top-menu', [
    "current" => null
])
<!-- /TOP MENU --->

@include('forms.hidden', [
    'id' => "id", 
    'value' => $file->id
])










<!--- BLOCK: --->
<div class="container mt-3 mb-3">
    <div class="row">

        <!--- Мета: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">
            <div class="image-container bg-white border">
                <a href="{{URL::to('/')}}/{{ $file->path }}" target="_blank"><img src="{{URL::to('/')}}/{{ $file->path }}" width="130px;"></a>
            </div>
        </div>
        <!--- /Мета --->

        <!--- Контент: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9 p-0">
 
            <div class="mb-4">

                <div class="font-roboto-bold font-size-19">Назва зображення:</div>
                <div class="font-roboto-light font-size-12 fc-secondary mb-1"></div>

                <div class="d-flex flex-row">
                    @include('forms.text', [
                        'id' => "title",  //'class' => '',
                        'placeholder' => "Назва",
                        'value' => $file->title
                    ])
                </div>
                
            </div>       

            <div>
            
                <div class="font-roboto-bold font-size-19">Детальний опис зображення:</div>
                <div class="font-roboto-light font-size-12 fc-secondary mb-1"></div>


                <div class="bg-white">
                    @include('forms.text-editor', [
                        'id' => "content", 
                        "readonly" => false, 
                        'value' =>  $file->content
                    ])
               </div>

               <div class="d-flex flex-row-reverse mb-3 mt-2">


                @include('forms.button', [
                    'id' => 'update_photo', // ідентифікатор кнопки
                    'title' => 'Зберегти', // надпис на кнопці
                    'size' => 'middle', // small, middle, big
                    'type' => 'green', // green, red, disabled, default
                    //'display' => false, // додає клан d-none
                    //'icon' => 'spinner' // наразі лише 1 іконка
                ])
                @include('forms.button', [
                    'id' => 'update_photo_request', // ідентифікатор кнопки
                    'title' => 'Обробляю запит', // надпис на кнопці
                    'size' => 'small', // small, middle, big
                    'type' => 'disabled', // green, red, disabled, default
                    'display' => false, // додає клан d-none
                    'icon' => 'spinner' // наразі лише 1 іконка
                ])
        
                <div class="ms-2 me-2">
                    @include('forms.modal-button', [
                        'id' => 'show-delete-modal', // ідентифікатор кнопки
                        'modal_id' => 'delete-modal', // ідентифікатор модального вікна
                        'title' => 'Видалити', // надпис на кнопці
                        'size' => 'middle', // small, middle, big
                        'type' => 'red', // green, red, disabled, default
                    ])
        
                    @include('templates.modal', [
                        'success_button_id' => 'confirm-deleting',
                        'modal_id' => 'delete-modal',
                        'title' => 'Точно бажаєш видалити цей файл?',
                        'content' => 'Буде видалено файл #' . $file->id,
                    ])
                </div>
        
            </div>

            <div class="font-size-12 font-roboto-light font-size-12 fc-secondary mb-1">Після видалення допис в базі залишиться, а файл буде знищений.</div>
        </div>
        <!--- /Контент --->


    </div> 
</div>
<!--- /BLOCK --->




<script src="{{URL::to('/')}}/js/files/update-file.js"></script>

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