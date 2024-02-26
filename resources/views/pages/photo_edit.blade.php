@extends('templates.PageTemplate')


@if($person != null) 
@section('title', $person->surname . " ". $person->name  )
@else 
@section('title', "404" )
@endif

@if($person != null) 
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
    ["title" => "Всі фотографії", "url" => URL::to('/') . '/person/' . $person->id . '/photographs'],
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

<!--- CONTENT: ---->
<div class="container mt-4 mb-4">

    <div class="photo-inner d-flex justify-content-start mb-3">
        <div class="image-outer">
            <a href="{{URL::to('/')}}/{{ $file->path }}" target="_blank"><img src="{{URL::to('/')}}/{{ $file->path }}" width="130px;"></a>
        </div>

        <div class="ps-3 flex-fill">
            @include("templates.person.section-title", [ 
                'left' => 'Назва:', 
                'right' => null
            ])

            <div class="d-flex flex-row">
                @include('forms.text', [
                    'id' => "title",  //'class' => '',
                    'placeholder' => "Назва",
                    'value' => $file->title
                ])
            </div>
        </div>
    </div>
    
    <div class="mb-3">
        @include("templates.person.section-title", [ 
            'left' => 'Опис :', 
            'right' => null
        ])
        <div class="bg-white">
        @include('forms.text-editor', [
            'id' => "content", 
            "readonly" => false, 
            'value' =>  $file->content
        ])
        </div>
    </div>



    <div class="d-flex flex-row-reverse mb-3">


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
    

</div>
<!--- /CONTENT ---->

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