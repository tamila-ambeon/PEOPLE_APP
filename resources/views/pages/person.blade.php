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



@include("templates.person.section-title", [ 
    'left' => 'Основна інформація:', 
    'right' => '[ <a href="'. URL::to("/") .'/person/'. $person->id.'/edit/contacts">редагувати</a> ]'
])

<div class="container">
    <div class="row quill-content">
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 rounded">
            <div><b>Прізвище:</b> {{$person->surname}}</div>
            <div><b>Ім'я:</b> {{$person->name}}</div>
            <div><b>По-батькові:</b> {{$person->middlename}}</div>
            <div><b>Гендер:</b> @if($person->gender == 0) Жінка @else Чоловік @endif</div>
            <div><b>Якість стосунків:</b> {{$person->relationship_quality}}</div>
            <div><b>Кількість стосунків:</b> {{$person->history_count}}</div>
            
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 rounded">
            <div><b>Дата знайомства:</b> {{$person->date_we_met}}</div>
            <div><b>Дата народження:</b> {{$person->birth_date}}</div>
            <div><b>Range X:</b> {{$person->range_x}} (
                @if($person->range_x >= 0 and $person->range_x <= 100) Близька людина - та, про кого треба думати
                @elseif($person->range_x > 100 and $person->range_x <= 400) Дальня людина - та, про кого я змушений думати
                @elseif($person->range_x > 400) Ворожа людина - та, кого слід уникати, з ким не можна мати справи, щоб не постраждати 
                @else 
                @endif
                )</div>
            <div><b>Range Y:</b> {{$person->range_y}} (
                @if($person->range_y >= 0 and $person->range_y <= 100) Важлива людина
                @elseif($person->range_y > 100 and $person->range_y <= 400) Середня важливість
                @elseif($person->range_y > 400) Незначна людина
                @else 
                @endif
            )</div>
        </div>
    </div>


</div>



@include("templates.person.section-title", [ 
    'left' => 'Резюме:', 
    'description' => 'Коротко про те, як взаємодіяти з цією людиною',
    'right' => '[ <a href="'. URL::to("/") .'/person/'. $person->id.'/edit/photo_and_resume">редагувати</a> ]'
])

<div class="bg-white rounded">
    @if($person->resume == null) 
        <div class="p-1 quill-content">Інформації немає.</div>
    @else 
        @include('forms.quill-content', [
            'id' => 'resume',
            'value' => $person->resume
        ])
    @endif
</div>








<div class="container p-0">
    <div class="row mt-3">
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">

        @include("templates.person.section-title", [ 
            'left' => 'Контакти:', 
            'right' => '[ <a href="'. URL::to("/") .'/person/'. $person->id.'/edit/contacts">редагувати</a> ]'
        ]) 
        @if($person->contacts == null) 
            <div class="ps-3 pe-3 p-1 quill-content">Інформації немає.</div>
        @else 
            <div class="ps-3 pe-3 bg-white rounded">
            @include('forms.quill-content', [
                'id' => 'contacts',
                'value' => $person->contacts
            ])
            </div>
        @endif
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 rounded">
        @include("templates.person.section-title", [ 
            'left' => 'Адреси:', 
            'right' => '[ <a href="'. URL::to("/") .'/person/'. $person->id.'/edit/contacts">редагувати</a> ]'
        ]) 
        @if($person->adresses == null) 
            <div class="ps-3 pe-3 p-1 quill-content">Інформації немає.</div>
        @else 
            <div class="ps-3 pe-3 bg-white rounded">
            @include('forms.quill-content', [
                'id' => 'adresses',
                'value' => $person->adresses
            ])
            </div>
        @endif
        </div>
    </div>
</div>






@include("templates.person.section-title", [ 
    'left' => 'Ознаки:', 
    'description' => 'Ознаки, які вбачаються у поведінці людини',
    'right' => '[ <a href="'. URL::to("/") .'/person/'. $person->id.'/edit/signs">редагувати</a> ]'
])
<div class="mb-3 bg-white">
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


@include("templates.person.section-title", [ 
    'left' => 'Слабкості:', 
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