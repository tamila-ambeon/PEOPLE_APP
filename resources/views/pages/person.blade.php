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



<!--- RESUME: --->
<div class="d-flex mt-2 mb-2">
    <div class="fixed-sidebar-200">
        <div class="font-roboto-bold font-size-19">Резюме:</div>
        <div class="font-roboto-light font-size-12 fc-secondary">Коротко про те, як взаємодіяти з цією людиною. Якщо людина робила мені добро, або зло - це мати бути тут коротко, щоб розуміти причину мого ставлення.</div>
    </div>
    <div class="grow-content">
        <div class="bg-white border">
            @if($person->resume != null) 
                @include('forms.quill-content', [
                    'id' => 'resume',
                    'value' => $person->resume
                ])  
            @endif
            <div class="d-flex flex-row-reverse @if($person->resume != null) border-top @endif ps-2 pe-2 font-size-14 edit-button-outer"><a href="{{URL::to("/")}}/person/{{$person->id}}/edit/photo_and_resume">редагувати</a></div> 
        </div> 
    </div>
</div>
<!--- /RESUME --->


<!--- : --->
<div class="d-flex mt-2 mb-2">
    <div class="fixed-sidebar-200">
        <div class="font-roboto-bold font-size-19">Рішення:</div>
        <div class="font-roboto-light font-size-12 fc-secondary">Чи хочу я цю людину в своєму житті?</div>
    </div>
    <div class="grow-content">
        <div class="bg-white border">
                
                <div class="d-flex flex-row">
                    <div class="d-flex flex-row p-1">
                        <div class="font-size-13">
                            @include('forms.select', [
                                'id' => "decision",  
                                'items' => [
                                    0 => "Невідомо", 
                                    1 => "Жодних справ з цією людиною", 
                                    2 => "Краще уникати", 
                                    3 => "Нейтрально",
                                    4 => "Краще бути в контакті",
                                    5 => "З цією людиною вигідно мати справу",
                                    6 => "Дуже важлива для мене людина"
                                ],
                                "disabled" => true,
                                'selected_value' => 0
                            ])
                        </div>
                    </div>
                </div>
                <div class="bg-white border-top d-flex ps-2 pe-2 font-size-12">
                    Варто чи ні мати стосунки з цією людиною.
                </div>
                <div class="bg-white border-top d-flex flex-row-reverse ps-2 pe-2 font-size-14 edit-button-outer">
                    <a href="{{URL::to("/")}}/person/{{$person->id}}/edit/">редагувати</a>
                </div> 
            </div>

    </div> 
</div>
<!--- / --->

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
                                            'id' => "wage",  
                                            'items' => [ 
                                                0 => "Невідомо", 
                                                1 => "Незначна людина", 
                                                2 => "Має невеликий вплив", 
                                                3 => "Має значний вплив", 
                                                4 => "Можновладець"
                                            ],
                                            "disabled" => true,
                                            'selected_value' => 0
                                        ])
                                    </td>
                                </tr>                     
                                <tr><td class="font-roboto-bold">Релігійні погляди:</td>
                                    <td>
                                        @include('forms.select', [
                                            'id' => "religion",  
                                            'items' => [ 0 => "Невідомо", 1 => "Атеїст", 2 => "Християнин", 3 => "Мусульманин"],
                                            "disabled" => true,
                                            'selected_value' => 0
                                        ])  
                                    </td>
                                </tr>
                                <tr><td class="font-roboto-bold">Круг:</td>
                                    <td>
                                        @include('forms.select', [
                                            'id' => "circle",  
                                            'items' => [ 
                                                0 => "Невідомо", 
                                                1 => "Близька людина", 
                                                2 => "Дальня людина", 
                                                3 => "Нейтральна людина", 
                                                4 => "Ворожа людина"],
                                            "disabled" => true,
                                            'selected_value' => 0
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
                                'items' => [0 => "Невідомо", 1 => "Ліві", 2 => "Праві", 3 => "Центристські"],
                                "disabled" => true,
                                'selected_value' => 0
                            ])
                        </div>
                    </div>
                    <div class="d-flex flex-row p-1">
                        <div class="font-size-13">
                            @include('forms.select', [
                                'id' => "radicalism",  
                                'items' => [0 => "Невідомо", 1 => "Помірковані", 2 => "Радикальні"],
                                "disabled" => true,
                                'selected_value' => 0
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
                                    'items' => [ 
                                        0 => "Невідомо", 
                                        1 => "Не довіряю", 
                                        2 => "Швидше ні", 
                                        3 => "Нейтрально", 
                                        4 => "Швидше так",
                                        5 => "Довіряю",
                                    ],
                                    "disabled" => true,
                                    'selected_value' => 0
                                ])
                            </td>
                        </tr>                     
                        <tr><td class="font-roboto-bold">
                            Довіра до мене:
                            <br><span class="font-roboto-light font-size-12 fc-secondary">Чи відчуваю Я, що людина мені довіряє? </span>

                        </td>
                            <td>
                                @include('forms.select', [
                                    'id' => "trust_in_me",  
                                    'items' => [ 
                                        0 => "Невідомо", 
                                        1 => "Не довіряє", 
                                        2 => "Швидше ні", 
                                        3 => "Нейтрально", 
                                        4 => "Швидше так",
                                        5 => "Довіряє",
                                    ],
                                    "disabled" => true,
                                    'selected_value' => 0
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
                                    'items' => [ 
                                        0 => "Невідомо", 
                                        1 => "Цілком безпечна", 
                                        2 => "Швидше безпечна", 
                                        3 => "Нейтральна", 
                                        4 => "Може бути небезпечною",
                                        5 => "Небезпечна!",
                                    ],
                                    "disabled" => true,
                                    'selected_value' => 0
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
                                    'items' => [ 
                                        0 => "Невідомо", 
                                        1 => "Зневажає", 
                                        2 => "Мало поваги", 
                                        3 => "Нейтрально", 
                                        4 => "Виявляє повагу",
                                        5 => "Поважає",
                                    ],
                                    "disabled" => true,
                                    'selected_value' => 0
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
                                    'items' => [ 
                                        0 => "Невідомо", 
                                        1 => "Жодної користі", 
                                        2 => "Мало користі",  
                                        3 => "Багато користі",
                                    ],
                                    "disabled" => true,
                                    'selected_value' => 0
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






<!--- CONTACT: --->
<div class="d-flex mt-2 mb-2">
    <div class="fixed-sidebar-200">
        <div class="font-roboto-bold font-size-19">Контакти та адреси:</div>
        <div class="font-roboto-light font-size-12 fc-secondary">Всі способи зв'язатись з людиною. Соціальні мережі.</div>
    </div>
    <div class="grow-content">
        <div class="bg-white border">
            @if($person->contacts != null) 
                <div class="ps-3 pe-3 bg-white rounded">
                @include('forms.quill-content', [
                    'id' => 'contacts',
                    'value' => $person->contacts
                ])
                </div>
            @endif
            <div class="d-flex flex-row-reverse @if($person->contacts != null) border-top @endif ps-2 pe-2 font-size-14 edit-button-outer"><a href="{{URL::to("/")}}/person/{{$person->id}}/edit/contacts">редагувати</a></div> 
        </div> 
    </div>
</div>
<!--- /CONTACT --->




<!---  --->
<div class="d-flex mt-2 mb-2">
    <div class="fixed-sidebar-200">
        <div class="font-roboto-bold font-size-19">Що ця людина може мені дати?</div>
        <div class="font-roboto-light font-size-12 fc-secondary">Чим ця людина корисна? До яких ресурсів ця людина має доступ? Що я хочу від неї отримати. Нічого? секс, гроші, повагу? </div>
    </div>
    <div class="grow-content">
        <div class="bg-white border">

            <div class="d-flex flex-row-reverse ps-2 pe-2 font-size-14 edit-button-outer">
                <a href="{{URL::to("/")}}/person/{{$person->id}}/edit">редагувати</a>
            </div> 
        </div> 
    </div>
</div>
<!--- / --->


<!---  --->
<div class="d-flex mt-2 mb-2">
    <div class="fixed-sidebar-200">
        <div class="font-roboto-bold font-size-19">Що я можу дати:</div>
        <div class="font-roboto-light font-size-12 fc-secondary">Кількість добра, яку я можу дати цій людині. Якщо людина робить мені зло, то на нього слід відповідати злом. Лише я вирішую на скільки я готовий вкластись і ні копійкою більше</div>
    </div>
    <div class="grow-content">
        <div class="bg-white border">

            <div class="d-flex flex-row-reverse ps-2 pe-2 font-size-14 edit-button-outer">
                <a href="{{URL::to("/")}}/person/{{$person->id}}/edit">редагувати</a>
            </div> 
        </div> 
    </div>
</div>
<!--- / --->





<!---  --->
<div class="d-flex mt-2 mb-2">
    <div class="fixed-sidebar-200">
        <div class="font-roboto-bold font-size-19">Який вайб випромінює:</div>
        <div class="font-roboto-light font-size-12 fc-secondary">Як я почуваю себе в її присутності? Що я відчуваю після спілкування з цією людиною?</div>
    </div>
    <div class="grow-content">
        <div class="bg-white border">

            <div class="d-flex flex-row-reverse ps-2 pe-2 font-size-14 edit-button-outer">
                <a href="{{URL::to("/")}}/person/{{$person->id}}/edit">редагувати</a>
            </div> 
        </div> 
    </div>
</div>
<!--- / --->




<!---  --->
<div class="d-flex mt-2 mb-2">
    <div class="fixed-sidebar-200">
        <div class="font-roboto-bold font-size-19">Слабкості:</div>
        <div class="font-roboto-light font-size-12 fc-secondary">Чим можна надавити, щоб прожати цю людину?</div>
    </div>
    <div class="grow-content">
        <div class="bg-white border">
            @if($person->weaknesses != null) 
                <div class="ps-3 pe-3 bg-white rounded">
                @include('forms.quill-content', [
                    'id' => 'weaknesses',
                    'value' => $person->weaknesses
                ])
                </div>
            @endif
            <div class="d-flex flex-row-reverse ps-2 pe-2 font-size-14 edit-button-outer @if($person->weaknesses != null) border-top @endif">
                <a href="{{URL::to("/")}}/person/{{$person->id}}/edit/other-info">редагувати</a>
            </div> 
        </div> 
    </div>
</div>
<!--- / --->




<!---  --->
<div class="d-flex mt-2 mb-2">
    <div class="fixed-sidebar-200">
        <div class="font-roboto-bold font-size-19">Який контент споживає:</div>
        <div class="font-roboto-light font-size-12 fc-secondary">Хто є кумиром людини? Ким ця людина захоплюється? Що її вражає?</div>
    </div>
    <div class="grow-content">
        <div class="bg-white border">

            <div class="d-flex flex-row-reverse ps-2 pe-2 font-size-14 edit-button-outer">
                <a href="{{URL::to("/")}}/person/{{$person->id}}/edit">редагувати</a>
            </div> 
        </div> 
    </div>
</div>
<!--- / --->

<!---  --->
<div class="d-flex mt-2 mb-2">
    <div class="fixed-sidebar-200">
        <div class="font-roboto-bold font-size-19">Усі інші відомості про людину:</div>
        <div class="font-roboto-light font-size-12 fc-secondary">Що ще я дізнався? Сюди все, що не входить у попередні секції. Не треба робити цю програму надто великою. Тут достатньо всього.</div>
    </div>
    <div class="grow-content">
        <div class="bg-white border">
            @if($person->other_info != null) 
                <div class="ps-3 pe-3 bg-white rounded">
                @include('forms.quill-content', [
                    'id' => 'other_info',
                    'value' => $person->other_info
                ])
                </div>
            @endif
            <div class="d-flex flex-row-reverse ps-2 pe-2 font-size-14 edit-button-outer @if($person->other_info != null) border-top @endif">
                <a href="{{URL::to("/")}}/person/{{$person->id}}/edit/other-info">редагувати</a>
            </div> 
        </div> 
    </div>
</div>
<!--- / --->


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