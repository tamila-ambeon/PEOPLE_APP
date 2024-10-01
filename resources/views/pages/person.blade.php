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


<!------------------->
<div class="container mb-5">
    <div class="row pt-3">

@include('parts.person.open_question', config('people.pages_description.resume'))

@include('parts.person.decision')

<!--- MAIN INFO: --->
<div class="d-flex mt-2 mb-2">
    <div class="fixed-sidebar-200">
        <div class="font-roboto-bold font-size-19">Основна інформація:</div>
        <div class="font-roboto-light font-size-12 fc-secondary">Загальні відомості</div>
    </div>
    <div class="grow-content">
        <div class="bg-white border">
            <div class="p-2">

                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-lg-6 col-xl-6">
                            <table class="table font-size-13">
                                <tbody>
                                <tr>
                                    <td class="font-roboto-bold">ПІБ</td><td>{{$person->surname}} {{$person->name}} {{$person->middlename}}</td>
                                </tr>  
                                <tr>
                                    <td class="font-roboto-bold">Стать:</td><td>ж/ч</td>
                                </tr>                  
                                <tr><td class="font-roboto-bold">Дата знайомства:</td><td>{{$person->date_we_met}} (час)</td></tr>
                                <tr><td class="font-roboto-bold">Дата народження:</td><td>{{$person->birth_date}} (вік)</td></tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-lg-6 col-xl-6">
                            <table class="table font-size-13">
                                <tbody>
                                <tr>
                                    <td class="font-roboto-bold">
                                        <div class="d-flex align-items-center">Вага у суспільстві</div>
                                    </td>
                                    <td>
                                        @include('forms.select', [
                                            'id' => "weight",  
                                            'items' => config('people.weight'),
                                            "disabled" => true,
                                            'selected_value' => $person->weight
                                        ])
                                    </td>
                                </tr>                     
                                <tr><td class="font-roboto-bold">Релігійні погляди:</td>
                                    <td>
                                        @include('forms.select', [
                                            'id' => "religion",  
                                            'items' => config('people.religion'),
                                            "disabled" => true,
                                            'selected_value' => $person->religion
                                        ])  
                                    </td>
                                </tr>
                                <tr><td class="font-roboto-bold">Круг:</td>
                                    <td>
                                        @include('forms.select', [
                                            'id' => "circle",  
                                            'items' => config('people.circle'),
                                            "disabled" => true,
                                            'selected_value' => $person->circle
                                        ])
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>




            </div>
            <div class="d-flex flex-row-reverse border-top ps-2 pe-2 font-size-14 edit-button-outer"><a href="{{URL::to("/")}}/person/{{$person->id}}/edit/contacts">редагувати</a></div> 
        </div> 
    </div>
</div>
<!--- /MAIN INFO --->



<!--- : --->
<div class="d-flex mt-2 mb-2">
    <div class="fixed-sidebar-200">
        <div class="font-roboto-bold font-size-19">Політичні погляди:</div>
        <div class="font-roboto-light font-size-12 fc-secondary">Крило і радикальність</div>
    </div>
    <div class="grow-content">
        <div class="bg-white border">
                
                <div class="d-flex flex-row">
                    <div class="d-flex flex-row p-1">
                        <div class="font-size-13">
                            @include('forms.select', [
                                'id' => "wing",  
                                'items' => config('people.wing'),
                                "disabled" => true,
                                'selected_value' => $person->wing
                            ])
                        </div>
                    </div>
                    <div class="d-flex flex-row p-1">
                        <div class="font-size-13">
                            @include('forms.select', [
                                'id' => "radicalism",  
                                'items' => config('people.radicalism'),
                                "disabled" => true,
                                'selected_value' => $person->radicalism
                            ])
                        </div>
                    </div>
                </div>
                <div class="bg-white border-top d-flex ps-2 pe-2 font-size-12">
                    Треба знати політичні погляди ВСІХ оточуючих людей. Щоб знати хто мене оточує. 
                    <br>І можливо ще де вони перебувають (територіально, категорично), щоб знати куди йти, щоб знайти своїх.
                    <br>Politics is reflection of values.
                    <br>Build relations які грунтуються на спільних values.
                </div>
                <div class="bg-white border-top d-flex flex-row-reverse ps-2 pe-2 font-size-14 edit-button-outer">
                    <a href="{{URL::to("/")}}/person/{{$person->id}}/edit/">редагувати</a>
                </div> 
            </div>

    </div> 
</div>
<!--- / --->



<!--- : --->
<div class="d-flex mt-2 mb-2">
    <div class="fixed-sidebar-200">
        <div class="font-roboto-bold font-size-19">Довіра, безпека, повага і користь:</div>
        <div class="font-roboto-light font-size-12 fc-secondary"></div>
    </div>
    <div class="grow-content">
        <div class="bg-white border">
                
                <div class="d-flex flex-row">
                    <table class="table font-size-13">
                        <tbody>
                        <tr>
                            <td class="font-roboto-bold">
                                <div class="d-flex align-items-center">Чи довіряю я цій людині:</div>
                            </td>
                            <td>
                                @include('forms.select', [
                                    'id' => "trust_in_person",  
                                    'items' => config('people.trust_in_person'),
                                    "disabled" => true,
                                    'selected_value' => $person->trust_in_person
                                ])
                            </td>
                        </tr>                     
                        <tr><td class="font-roboto-bold">
                            Довіра до мене:
                            <br><span class="font-roboto-light font-size-12 fc-secondary">Чи відчуваю Я, що людина мені довіряє?</span>

                        </td>
                            <td>
                                @include('forms.select', [
                                    'id' => "trust_in_me",  
                                    'items' => config('people.trust_in_me'),
                                    "disabled" => true,
                                    'selected_value' => $person->trust_in_me
                                ]) 
                            </td>
                        </tr>
                        <tr>
                            <td class="font-roboto-bold">
                                <div class="d-flex align-items-center">Що показує історія стосунків:</div>
                            </td>
                            <td>к-ть: {{$person->history_count}}, якість: {{$person->relationship_quality}}</td>
                        </tr> 
                        <tr><td class="font-roboto-bold">На скільки ця людина є небезпечною для мене:</td>
                            <td>
                                @include('forms.select', [
                                    'id' => "dangerous",  
                                    'items' =>  config('people.dangerous'),
                                    "disabled" => true,
                                    'selected_value' => $person->dangerous
                                ]) 
                            </td>
                        </tr>

                        <tr><td class="font-roboto-bold">
                            Повага до мене:
                            <br><span class="font-roboto-light font-size-12 fc-secondary">Чи відчуваю я повагу до себе?</span>

                        </td>
                            <td>
                                @include('forms.select', [
                                    'id' => "respect_in_me",  
                                    'items' => config('people.respect_in_me'),
                                    "disabled" => true,
                                    'selected_value' => $person->respect_in_me
                                ]) 
                            </td>
                        </tr>
                        
                        <tr><td class="font-roboto-bold">
                            Користь для мене:
                            <br><span class="font-roboto-light font-size-12 fc-secondary">Чим більше користі приносить, тим більше значення має слово цієї людини. <br>Якщо ця людина для мене не є корисною, то навіщо я витрачаю на неї час?</span>

                        </td>
                            <td>
                                @include('forms.select', [
                                    'id' => "benefits_for_me",  
                                    'items' => config('people.benefits_for_me'),
                                    "disabled" => true,
                                    'selected_value' => $person->benefits_for_me
                                ]) 
                            </td>
                        </tr>


                        </tbody>
                    </table>
                </div>
                <div class="bg-white border-top d-flex ps-2 pe-2 font-size-12">
                    Чи надійна ці людина? Чи можна на неї покластись?
                </div>
                <div class="bg-white border-top d-flex flex-row-reverse ps-2 pe-2 font-size-14 edit-button-outer">
                    <a href="{{URL::to("/")}}/person/{{$person->id}}/edit/">редагувати</a>
                </div> 
            </div>
    </div>
</div>
<!--- / --->



@include('parts.person.open_question', config('people.pages_description.contacts'))
@include('parts.person.open_question', config('people.pages_description.personal_resources'))
@include('parts.person.open_question', config('people.pages_description.potential_contributions'))
@include('parts.person.open_question', config('people.pages_description.vibe'))
@include('parts.person.open_question', config('people.pages_description.weaknesses'))
@include('parts.person.open_question', config('people.pages_description.content_preferences'))
@include('parts.person.open_question', config('people.pages_description.other_info'))

    <!---------->
    </div>
</div>
<!------------------->
    

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