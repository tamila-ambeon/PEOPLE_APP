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
        <div class="font-roboto-light font-size-12 fc-secondary">Коротко про те, як взаємодіяти з цією людиною</div>
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



<!--- MAIN INFO: --->
<div class="d-flex mt-2 mb-2">
    <div class="fixed-sidebar-200">
        <div class="font-roboto-bold font-size-19">Основна інформація:</div>
        <div class="font-roboto-light font-size-12 fc-secondary">Загальні відомості</div>
    </div>
    <div class="grow-content">
        <div class="bg-white border">
            <div class="p-2">
                <div><b>ПІБ:</b> {{$person->surname}} {{$person->name}} {{$person->middlename}} </div>
                <div><b>Дата знайомства:</b> {{$person->date_we_met}}</div>
                <div><b>Дата народження:</b> {{$person->birth_date}}</div>
            </div>
            <div class="d-flex flex-row-reverse border-top ps-2 pe-2 font-size-14 edit-button-outer"><a href="{{URL::to("/")}}/person/{{$person->id}}/edit/contacts">редагувати</a></div> 
        </div> 
    </div>
</div>
<!--- /MAIN INFO --->


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







@include("templates.person.section-title", [ 
    'left' => 'Ознаки:', 
    'description' => 'Ознаки, які вбачаються у поведінці людини',
    'right' => '[ <a href="'. URL::to("/") .'/person/'. $person->id.'/edit/signs">редагувати</a> ]'
])
<div class="mb-3">
    @forelse($person->signs as $sign) 
        @if($person->gender == 0)
            <a href="{{URL::to("/")}}/sign/{{$sign->id}}" class="btn btn-sm @if($sign->type_id == 1) btn-success @elseif($sign->type_id == -1) btn-danger @else btn-light @endif">{{$sign->title_women}}</a>
        @else 
        <a href="{{URL::to("/")}}/sign/{{$sign->id}}" class="btn btn-sm @if($sign->type_id == 1) btn-success @elseif($sign->type_id == -1) btn-danger @else btn-light @endif">{{$sign->title_men}}</a>
        @endif
    @empty
    <p>Ознак немає.</p>
    @endforelse
    
</div>





@include("templates.person.section-title", [ 'left' => 'Який контент споживає:', 'right' => '' ])
<div class="bg-white rounded">
    TODO!
</div>

@include("templates.person.section-title", [ 'left' => 'Чим ця людина може бути корисна:', 'right' => '' ])
<div class="bg-white rounded">
    TODO!
</div>

@include("templates.person.section-title", [ 'left' => 'Який вайб випромінює:', 
'description' => 'Що я відчуваю після спілкування з цією людиною?',
'right' => '' ])
<div class="bg-white rounded">
    TODO!
</div>

@include("templates.person.section-title", [ 
    'left' => 'Слабкості:', 
    'description' => 'Чим можна надавити, щоб прожати цю людину?',
    'right' => '[ <a href="'. URL::to("/") .'/person/'. $person->id.'/edit/other-info">редагувати</a> ]'
])


<div class="bg-white rounded">
    @if($person->weaknesses== null) 
        <div class="p-1 quill-content">Інформації немає.</div>
    @else 
        @include('forms.quill-content', [
            'id' => 'weaknesses',
            'value' => $person->weaknesses
        ])
    @endif
</div>


@include("templates.person.section-title", [ 
    'left' => 'Усі інші відомості про людину:', 
    'description' => 'Факти про людей дуже цінні',
    'right' => '[ <a href="'. URL::to("/") .'/person/'. $person->id.'/edit/other-info">редагувати</a> ]'
])

<div class="bg-white rounded">
    @if($person->other_info == null) 
        <div class="p-1 quill-content">Інформації немає.</div>
    @else 
        @include('forms.quill-content', [
            'id' => 'other_info',
            'value' => $person->other_info
        ])
    @endif
</div>




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