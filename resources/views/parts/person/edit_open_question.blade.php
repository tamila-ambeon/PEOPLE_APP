
@if(in_array($field, config('people.text_pages')))
<!----------------------------------------------------------------------->
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
    ["title" => "Редагування рішення:", "url" => null],
]])
<!--------- /BREADCRUMBS ---------->


<!-- TOP MENU: --->
@include('templates.person.top-menu', [
    "current" => null, 
    "person" => $person
])
<!-- /TOP MENU --->


@include('forms.hidden', [
    'id' => "id", 
    'value' => $person->id
])


<!--- BLOCK: --->
<div class="container mt-3 mb-3">
    <div class="row">

        <!--- Мета: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">
            <div class="">
                <div class="font-roboto-bold font-size-19">
                    {{config('people.pages_description.'.$field.'.title')}}
                </div>
                <div class="font-roboto-light font-size-12 fc-secondary">
                    {!! config('people.pages_description.'.$field.'.description') !!}
                </div>
            </div>
        </div>
        <!--- /Мета --->

        <!--- Контент: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9 p-0">
            <div class="mt-1">
                <div class="">
                    <div class="container ">
                        <div class="editor mt-2 bg-white">
                            @include('forms.text-editor', [
                                'id' => $field, 
                                "readonly" => false, 
                                'value' => $person->$field
                            ])
                        </div>
                    
                        <div class="button mt-2">
                            <div class="d-flex flex-row-reverse">
                                @include('forms.button', [
                                    'id' => 'save', // ідентифікатор кнопки
                                    'title' => 'Зберегти', // надпис на кнопці
                                    'size' => 'big', // small, middle, big
                                    'type' => 'green', // green, red, disabled, default
                                    //'display' => false, // додає клан d-none
                                    //'icon' => 'spinner' // наразі лише 1 іконка
                                ]) 
                    
                                @include('forms.button', [
                                    'id' => 'handle_request', // ідентифікатор кнопки
                                    'title' => 'Обробляю запит', // надпис на кнопці
                                    'size' => 'big', // small, middle, big
                                    'type' => 'disabled', // green, red, disabled, default
                                    'display' => false, // додає клан d-none
                                    'icon' => 'spinner' // наразі лише 1 іконка
                                ])
                            </div>
                        </div>
                    </div>
                    
                    <script>
class OpenAnswer extends FormGrabber
{
    beforeSend() {}
    onSuccess(json) {
        location.reload()
    }
    onError(error) {}
}

try {
    let mainInfo = new OpenAnswer({
        "debug": true,
        'button_id': "save",
        'switch_button_id': "handle_request",
        'input_ids': ["id", "{{$field}}"],
        'method': "PATCH",
        'endpoint': document.getElementsByTagName("base")[0].href + "api/main_info",
    })
} catch (e) {
    console.log('Error while creating form listener: ', e)
} 
                    </script>
                </div>
            </div>
        </div>
        <!--- /Контент --->

    </div> 
</div>
<!--- /BLOCK --->





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
<!----------------------------------------------------------------------->
@else
<!--------------------------------------------------------------------------------------------->

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
    ["title" => "Редагування рішення:", "url" => null],
]])
<!--------- /BREADCRUMBS ---------->


<!-- TOP MENU: --->
@include('templates.person.top-menu', [
    "current" => null, 
    "person" => $person
])
<!-- /TOP MENU --->

<!--- BLOCK: --->
<div class="container mt-3 mb-3">
    <div class="row">
        Вказаного поля не існує: {{$field}}
    </div> 
</div>
<!--- /BLOCK --->  
@endsection
@endif
<!--------------------------------------------------------------------------------------------->
@endif