@extends('templates.PageTemplate')



@if($person != null) 
@section('title', 'Ознаки ' . $person->surname . ' ' .$person->name )
@else 
@section('title', "404" )
@endif

@if($person != null) 
@section('content')

<!--------- TITLE: ---------->
@include('templates.header', [
    'title' => $person->surname . ' ' .$person->name
])
<!--------- /TITLE ---------->


<!--------- BREADCRUMBS: ---------->
@include('templates.breadcrumbs', [ 'items' => [
    ["title" => "Головна", "url" => URL::to('/')],
    ["title" => "Список людей", "url" => URL::to('/') . '/people-list'],
    ["title" => $person->surname ." ". $person->name ." ". $person->middlename, "url" => URL::to('/') . '/person/' . $person->id],
    ["title" => "Вибір ознак:", "url" => null],
]])
<!--------- /BREADCRUMBS ---------->

@include('forms.hidden', [
    'id' => "person_id", 
    'value' => $person->id
])


<div class="container mt-4 mb-4 pt-3 pb-3">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
            
            <h3>Обери ті ознаки, які вбачаються в поведінці цієї людини:</h3>

            <div class="d-flex flex-row flex-wrap">
                @include('forms.checkbox', [
                    'id' => "signs", 
                    "disabled" => false, 
                    'items' => $genderSign[$person->gender], 
                    'checked_values' => $checked_signs
                ])
            </div>

        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
            
          
            
        </div>
    </div>


    
    <div class="row mt-4">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12"> 

            <div class="d-flex flex-row-reverse">
                @include('forms.button', [
                    'id' => 'save_signs', // ідентифікатор кнопки
                    'title' => 'Зберегти', // надпис на кнопці
                    'size' => 'middle', // small, middle, big
                    'type' => 'green', // green, red, disabled, default
                    //'display' => false, // додає клан d-none
                    //'icon' => 'spinner' // наразі лише 1 іконка
                ])

                @include('forms.button', [
                    'id' => 'save_signs_request', // ідентифікатор кнопки
                    'title' => 'Обробляю запит', // надпис на кнопці
                    'size' => 'middle', // small, middle, big
                    'type' => 'disabled', // green, red, disabled, default
                    'display' => false, // додає клан d-none
                    'icon' => 'spinner' // наразі лише 1 іконка
                ])
            </div>

        </div>
    </div>  

</div>

<script src="{{URL::to('/')}}/js/signs/save_signs.js"></script>














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