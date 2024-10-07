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
    ["title" => "Редагування основної інформації:", "url" => null],
]])
<!--------- /BREADCRUMBS ---------->

@include('forms.hidden', [
    'id' => "id", 
    'value' => $person->id
])

<div class="container mt-4 mb-5">
    @include("templates.person.section-title", [ 'left' => 'Редагування основної інформації:', 'right' => ''])


<!--- Контент: --->
<div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9 p-0">
    <table class="table font-size-13 border m-0">
        <tbody>
            <tr>
                <td class="font-roboto-bold"><div class="d-flex align-items-center">Прізвище:</div></td>
                <td class="bg-light border-start">
                    @include('forms.text', [
                        'id' => "surname", 'placeholder' => "Прізвище", 
                        'value' => $person->surname
                    ])
                </td>
            </tr>

            <tr>
                <td class="font-roboto-bold"><div class="d-flex align-items-center">Ім'я:</div></td>
                <td class="bg-light border-start">
                    @include('forms.text', [
                        'id' => "name", 'placeholder' => "Ім'я", 
                        'value' => $person->name
                    ])
                </td>
            </tr>

            <tr>
                <td class="font-roboto-bold"><div class="d-flex align-items-center">По-батькові:</div></td>
                <td class="bg-light border-start">
                    @include('forms.text', [
                        'id' => "middlename", 'placeholder' => "По-батькові", 
                        'value' => $person->middlename
                    ])
                </td>
            </tr>

            <tr>
                <td class="font-roboto-bold"><div class="d-flex align-items-center">Дата нашого знайомства:</div></td>
                <td class="bg-light border-start">
                    @include('forms.date-picker', [
                        'id' => "date_we_met",
                        "disabled" => false,
                        'value' => $person->date_we_met // format: YYYY-MM-DD
                    ])
                </td>
            </tr>

            <tr>
                <td class="font-roboto-bold"><div class="d-flex align-items-center">Дата народження:</div></td>
                <td class="bg-light border-start">
                    @include('forms.date-picker', [
                        'id' => "birth_date",
                        "disabled" => false,
                        'value' => $person->birth_date // format: YYYY-MM-DD
                    ])
                </td>
            </tr>

        </tbody>
    </table>
    <div class="d-flex flex-row-reverse ps-2 pe-2 font-size-14 edit-button-outer"></div> 
</div>
<!--- /Контент --->





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