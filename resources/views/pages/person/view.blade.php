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
    ["title" => $person->surname ." ". $person->name ." ". $person->middlename, "url" => null],
]])
<!--------- /BREADCRUMBS ---------->


<!-- TOP MENU: --->
@include('templates.person.top-menu', [
    "current" => URL::to('/') . "/person/" . $person->id, 
    "person" => $person
])
<!-- /TOP MENU --->

@include('forms.hidden', [
    'id' => "person_id", 
    'value' => $person->id
])


<!------------------->
<div class="container mb-5">
    <div class="row pt-3">

@include('parts.person.view_open_question', config('people.pages_description.resume'))


@include('parts.person.select_answer', ['field' => 'decision'])
@include('parts.person.select_answer', ['field' => 'circle'])





<!--- BLOCK: --->
<div class="container mt-3 mb-3">
    <div class="row">

        <!--- Мета: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">
            <div class="">
                <div class="font-roboto-bold font-size-19">Основна інформація:</div>
                <div class="font-roboto-light font-size-12 fc-secondary mb-1">Загальні відомості</div>
            </div>
        </div>
        <!--- /Мета --->

        <!--- Контент: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9 p-0">
            <table class="table font-size-13 border m-0">
                <tbody>
                    <tr>
                        <td class="font-roboto-bold"><div class="d-flex align-items-center">ПІБ:</div></td>
                        <td class="bg-light border-start">{{$person->surname}} {{$person->name}} {{$person->middlename}}</td>
                    </tr>
                    <tr>
                        <td class="font-roboto-bold"><div class="d-flex align-items-center">Стать:</div></td>
                        <td class="bg-light border-start">@include('parts.person.select_with_autosave', ['field' => 'gender'])</td>
                    </tr>
                    <tr>
                        <td class="font-roboto-bold"><div class="d-flex align-items-center">Дата народження:</div></td>
                        <td class="bg-light border-start">{{$person->birth_date}} (вік)</td>
                    </tr>
                    <tr>
                        <td class="font-roboto-bold"><div class="d-flex align-items-center">Дата знайомства:</div></td>
                        <td class="bg-light border-start">{{$person->date_we_met}} (час)</td>
                    </tr>
                </tbody>
            </table>
            <div class="d-flex flex-row-reverse ps-2 pe-2 font-size-14 edit-button-outer"><a href="{{URL::to("/")}}/person/{{$person->id}}/edit">редагувати</a></div> 
        </div>
        <!--- /Контент --->

    </div> 
</div>
<!--- /BLOCK --->



<!--- BLOCK: --->
<div class="container mt-3 mb-3">
    <div class="row">

        <!--- Мета: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">
            <div class="">
                <div class="font-roboto-bold font-size-19">Політичні погляди:</div>
                <div class="font-roboto-light font-size-12 fc-secondary mb-1">Крило і радикальність</div>
            </div>
        </div>
        <!--- /Мета --->

        <!--- Контент: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9 p-0 border">
            <div class="d-flex flex-row bg-light">
                <div class="d-flex flex-row p-1">
                    <div class="font-size-13">
                        @include('parts.person.select_with_autosave', ['field' => "wing"])
                    </div>
                </div>
                <div class="d-flex flex-row p-1">
                    <div class="font-size-13">
                        @include('parts.person.select_with_autosave', ['field' => "radicalism"])
                    </div>
                </div>
                
            </div>
            <div class="bg-white border-top d-flex ps-2 pe-2 font-size-12 pt-1 pb-1">
                Політика це відображення людських цінностей.<br>Будуй стосунки, які грунтуються на спільних цінностях.
            </div>
        </div>
        <!--- /Контент --->

    </div> 
</div>
<!--- /BLOCK --->


@include('parts.person.select_answer', ['field' => 'religion'])
@include('parts.person.select_answer', ['field' => 'weight'])



<!--- BLOCK: --->
<div class="container mt-3 mb-3">
    <div class="row">

        <!--- Мета: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">
            <div class="">
                <div class="font-roboto-bold font-size-19">Довіра, безпека, повага і користь:</div>
                <div class="font-roboto-light font-size-12 fc-secondary mb-1">Чи надійна ці людина? Чи можна на неї покластись?</div>
            </div>
        </div>
        <!--- /Мета --->

        <!--- Контент: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9 p-0">
            <table class="table font-size-13 border">
                <tbody>
                <tr>
                    <td class="font-roboto-bold"><div class="d-flex align-items-center">Чи довіряю я цій людині:</div></td>
                    <td class="bg-light border-start">@include('parts.person.select_with_autosave', ['field' => 'trust_in_person'])</td>
                </tr>                     
                <tr>
                    <td class="font-roboto-bold">
                        Довіра до мене:
                        <br><span class="font-roboto-light font-size-12 fc-secondary">Чи відчуваю Я, що людина мені довіряє?</span>
                    </td>
                    <td class="bg-light border-start">@include('parts.person.select_with_autosave', ['field' => 'trust_in_me'])</td>
                </tr>
                <tr>
                    <td class="font-roboto-bold">
                        <div class="d-flex align-items-center">Історія стосунків:</div>
                    </td>
                    <td>
                        <div><a href="{{URL::to('/')}}/person/{{$person->id}}/stories">{{$person->history_count}} дописів</a></div>
                    </td>
                </tr>

                <tr>
                    <td class="font-roboto-bold">
                        Якість стосунків:
                        <br><span class="font-roboto-light font-size-12 fc-secondary">Кредит довіри</span>
                    </td>
                    <td>
                        <div>
                            @if($person->relationship_quality > 0) <span class="badge text-bg-success ps-3 pe-3 pt-2 pb-2 font-size-15">{{$person->relationship_quality}}</span> 
                            @elseif($person->relationship_quality < 0) <span class="badge text-bg-danger ps-3 pe-3 pt-2 pb-2 font-size-15">{{$person->relationship_quality}}</span>
                            @else <span class="badge text-bg-light ps-3 pe-3 pt-2 pb-2 font-size-15">{{$person->relationship_quality}}</span>
                            @endif
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="font-roboto-bold">На скільки ця людина є небезпечною для мене:</td>
                    <td class="bg-light border-start">@include('parts.person.select_with_autosave', ['field' => 'dangerous'])</td>
                </tr>

                <tr>
                    <td class="font-roboto-bold">
                        Повага до мене: <br><span class="font-roboto-light font-size-12 fc-secondary">Чи відчуваю я повагу до себе?</span>
                    </td>
                    <td class="bg-light border-start">@include('parts.person.select_with_autosave', ['field' => 'respect_in_me'])</td>
                </tr>
                
                <tr>
                    <td class="font-roboto-bold">
                        Користь для мене:
                        <br><span class="font-roboto-light font-size-12 fc-secondary">Чим більше користі приносить, тим більше значення має слово цієї людини. <br>Якщо ця людина для мене не є корисною, то навіщо я витрачаю на неї час?</span>
                    </td>
                    <td class="bg-light border-start">@include('parts.person.select_with_autosave', ['field' => 'benefits_for_me'])</td>
                </tr>
                </tbody>
            </table>
        </div>
        <!--- /Контент --->

    </div> 
</div>
<!--- /BLOCK --->


@include('parts.person.view_open_question', config('people.pages_description.contacts'))
@include('parts.person.view_open_question', config('people.pages_description.personal_resources'))
@include('parts.person.view_open_question', config('people.pages_description.potential_contributions'))
@include('parts.person.view_open_question', config('people.pages_description.vibe'))
@include('parts.person.view_open_question', config('people.pages_description.weaknesses'))
@include('parts.person.view_open_question', config('people.pages_description.content_preferences'))
@include('parts.person.view_open_question', config('people.pages_description.other_info'))

    <!---------->
    </div>
</div>
<!------------------->
    
<script>
$(document).ready(function() {
  // Вибираємо всі селекти (можете уточнити селектор, якщо їх багато)
    $('select').change(function() {

        // Отримуємо ID селекту
        let selectId = $(this).attr('id');

        // Отримуємо нове значення
        let newValue = $(this).val();

        // Робимо щось із отриманими даними, наприклад, виводимо їх в консоль
        console.log('Нове значення:', selectId, newValue, $(this).find('option:selected').text());

        // Блокуємо селект на 1 секунду
        $(this).prop('disabled', true);
        updateSelect(this, selectId, newValue)

    });
});


function updateSelect(select, field, value)
{
   let data = {}
        data["id"] = $('#person_id').val()
        data[field] = value
        console.log("data", data)

    $.ajax({
        type: "PATCH",
        url: document.getElementsByTagName("base")[0].href + "api/main_info",
        data: data,
        success: function(response) {
            // Код, який виконується після успішної відповіді від сервера
            console.log(response);
            $(select).prop('disabled', false);
        },
        error: function(error) {
            // Код, який виконується при виникненні помилки
            console.error(error);
        }
    });
}

</script>


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