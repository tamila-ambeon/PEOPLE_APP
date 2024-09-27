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


    @include("templates.person.section-title", [ 'left' => 'Статус:', 'right' => ''])
    <div class="row ps-2 pe-2">
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
            <div class="">Відстань Х:</div>
            <div class="">
                @include('forms.number', [
                    'id' => "range_x", //'class' => '',
                    'placeholder' => "X", 
                    "min" => "1", "max" => "1000", "step" => "1",
                    "disabled" => false,
                    'value' => $person->range_x
                ])
            </div>
            <div class="c">               
                @if($person->range_x >= 0 and $person->range_x <= 100) Близька людина - та, про кого треба думати
                @elseif($person->range_x > 100 and $person->range_x <= 400) Дальня людина - та, про кого я змушений думати
                @elseif($person->range_x > 400) Ворожа людина - та, кого слід уникати, з ким не можна мати справи, щоб не постраждати 
                @else 
                @endif
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
            <div class="">Відстань Y:</div>
            <div class="">
            @include('forms.number', [
                'id' => "range_y", //'class' => '',
                'placeholder' => "Y", 
                "min" => "1", "max" => "1000", "step" => "1",
                "disabled" => false,
                'value' => $person->range_y
            ])
            </div>
            <div class="c">  
                @if($person->range_y >= 0 and $person->range_y <= 100) Важлива людина
                @elseif($person->range_y > 100 and $person->range_y <= 400) Середня важливість
                @elseif($person->range_y > 400) Незначна людина
                @else 
                @endif 
            </div>           
        </div>

        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-2">
            <div class="border-top pt-2">               
                <= 100 Близька людина<br>
                > 100 <= 400 Дальня людина<br>
                > 400 Ворожа людина<br>
            </div>
         </div>

    </div>


</div>
</div>  


    @include("templates.person.section-title", [ 'left' => 'Контакти:', 'right' => ''])
    <div class="editor mb-2 bg-white">
        @include('forms.text-editor', [
            'id' => "contacts", 
            "readonly" => false, 
            'value' => $person->contacts
        ])
    </div>    
    

    @include("templates.person.section-title", [ 'left' => 'Адреси:', 'right' => ''])
    <div class="editor mb-2 bg-white">
        @include('forms.text-editor', [
            'id' => "adresses", 
            "readonly" => false, 
            'value' => $person->adresses
        ])
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