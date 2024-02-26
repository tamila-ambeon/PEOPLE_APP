@extends('templates.PageTemplate')



@if($sign != null) 
@section('title', $sign->title_men )
@else 
@section('title', "404" )
@endif

@if($sign != null) 
@section('content')

<!--------- TITLE: ---------->
@include('templates.header', [
    'title' => $sign->title_men
])
<!--------- /TITLE ---------->


<!--------- BREADCRUMBS: ---------->
@include('templates.breadcrumbs', [ 'items' => [
    ["title" => "Головна", "url" => URL::to('/')],
    ["title" => "Ознаки", "url" => URL::to('/') . '/signs-list'],
    ["title" => $sign->title_men, "url" => null],
]])
<!--------- /BREADCRUMBS ---------->



<div class="container mt-4 mb-4 pt-3 pb-3">

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">

            @include("templates.person.section-title", [ 'left' => "Назва ознаки:", 
            'right' => '[ <a href="'. URL::to("/") .'/sign/'. $sign->id.'/edit">редагувати</a> ]'])

            <div class="mb-2 ps-3 quill-content">
                <b>Чоловіча назва:</b> {{$sign->title_men}}<br>
                <b>Жіноча назва:</b> {{$sign->title_women}}<br>
            </div>


            @include("templates.person.section-title", [ 'left' => "Короткий опис одним реченням:", 'right' => ''])

            <div class="mb-2 ps-3 quill-content">
                @if($sign->short_description == null)
                <p>Нема опису.</p>
                @else 
                {{$sign->short_description}}
                @endif
            </div>

        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
            
            @include("templates.person.section-title", [ 'left' => "Тип ознаки:", 'right' => ''])

            <div class="mb-2">
            @include('forms.select', [
                'id' => "type_id",  
                'items' => [-1 => "Негативна", 0 => "Нейтральна", 1 => 'Позитивна'],
                "disabled" => true,
                'selected_value' => $sign->type_id
            ])
            </div>
            
            @include("templates.person.section-title", [ 'left' => "Іконка:", 'right' => ''])
            <div class="mb-2 ps-3">
                {{$sign->icon_id}}
            </div>
            
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12"> 

            @include("templates.person.section-title", [ 'left' => "Детальний опис ознаки:", 'right' => ''])

            @if($sign->full_description == null) 
                <div class="ps-3 pe-3 p-1 quill-content">Інформації немає.</div>
            @else 
                <div class="ps-3 pe-3 bg-white rounded">
                @include('forms.quill-content', [
                    'id' => 'full_description',
                    'value' => $sign->full_description
                ])
                </div>
            @endif

        </div>
    </div>  
    
    <div class="row mt-4 mb-2">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12"> 

            @include("templates.person.section-title", [ 'left' => "Люди, яким притамання ця ознака:", 'right' => ''])

            <div class="bg-white p-2"> 
                @forelse($sign->people as $person) 
                <a href="{{URL::to("/")}}/person/{{$person->id}}">{{$person->surname}} {{$person->name}}</a>

                @empty
                <p>Людей немає.</p>
                @endforelse
                
            </div>
        </div>
    </div>  


</div>














@endsection
@else 

@section('content')
<!--------- TITLE: ---------->
@include('templates.header', [
    'title' => "404"
])
<!--------- /TITLE ---------->
<p>Ознаки з вказаним ID не зареєстровано.</p>
@endsection

@endif