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
    ["title" => "Редагуємо історію #" . $history->id, "url" => null],
]])
<!--------- /BREADCRUMBS ---------->


<!-- TOP MENU: --->
@include('templates.person.top-menu', [
    "current" => URL::to('/') . "/person/" . $person->id . '/stories', 
    "person" => $person
])
<!-- /TOP MENU --->

@include('forms.hidden', [
    'id' => "id", 
    'value' => $history->id
])

<!--- CONTENT: ---->
<div class="container mt-4 mb-4">

    <div class="mb-3">
        @include("templates.person.section-title", [ 
            'left' => 'Дата події:', 
            'right' => null
        ])

        <div class="d-flex flex-row">
            @include('forms.date-picker', [
                'id' => "date",
                "disabled" => false,
                'value' => $history->date // format: YYYY-MM-DD
            ])
        </div>
    </div>
    

    <div class="mb-3">
        @include("templates.person.section-title", [ 
            'left' => 'Опис події:', 
            'right' => null
        ])
        <div class="bg-white">
        @include('forms.text-editor', [
            'id' => "content", 
            "readonly" => false, 
            'value' => $history->content
        ])
        </div>
    </div>

    <div class="mb-3">
    @include("templates.person.section-title", [ 
        'left' => 'Моя оцінка:', 
        'right' => null
    ])

    @include('forms.select', [
        'id' => "quality",  
        'items' => [
            -5 => "Піздець! Це неприпустимо! (-5)", 
            -4 => "Дуже сильно погано (-4)", 
            -3 => "Погано (-3)", 
            -2 => "Неприємно (-2)", 
            -1 => "Щось не так (-1)", 
            0 => "Нормально (0)", 
            1 => "Добрий знак (+1)",
            2 => "Приємно (+2)",
            3 => "Добре (+3)",
            4 => "Дуже добре (+4)",
            5 => "Супер пупер! Мега ідеально! (+5)",
        ],
        "disabled" => false,
        'selected_value' => $history->quality
    ])
    </div>


    <div class="d-flex flex-row-reverse mb-3">
        

        @include('forms.button', [
            'id' => 'update_history', // ідентифікатор кнопки
            'title' => 'Зберегти', // надпис на кнопці
            'size' => 'middle', // small, middle, big
            'type' => 'green', // green, red, disabled, default
            //'display' => false, // додає клан d-none
            //'icon' => 'spinner' // наразі лише 1 іконка
        ])
        @include('forms.button', [
            'id' => 'update_history_request', // ідентифікатор кнопки
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
        </div>

        @include('templates.modal', [
            'success_button_id' => 'confirm-deleting',
            'modal_id' => 'delete-modal',
            'title' => 'Точно бажаєш видалити цей допис?',
            'content' => 'Буде видалено історію #' . $history->id,
        ])

    </div>

  


</div>
<!--- /CONTENT ---->

<script src="{{URL::to('/')}}/js/person/edit-history.js"></script>

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