@extends('templates.PageTemplate')

@section('title', 'Список людей')
 
@section('content')

<!--------- BREADCRUMBS: ---------->
@include('templates.breadcrumbs', [ 'items' => [
    ["title" => "Головна", "url" => URL::to('/')],
    ["title" => "Список людей:", "url" => null],
]])
<!--------- /BREADCRUMBS ---------->

<div class="container mt-3 mb-0 pb-3 border-bottom">
    <div class="row">
    <div class="d-flex flex-row-reverse">
            <!---------------->
            @include('forms.button', [
                'id' => 'go-to-create-person', // ідентифікатор кнопки
                'title' => 'Додати людину', // надпис на кнопці
                'size' => 'big', // small, middle, big
                'type' => 'green', // green, red, disabled, default
                //'display' => false, // додає клан d-none
                //'icon' => 'spinner' // наразі лише 1 іконка
            ])
    </div>
    </div>
</div>
<script>
    // Редірект при кліку на кнопку створення:
    document.getElementById("go-to-create-person").onclick = function (event) {
        location.href = "{{URL::to('/')}}/person/create"
    }
</script>




<div class="container pt-3 d-flex justify-content-center ">
    {{ $people->links('templates.people-list-pagination') }}
</div>



<!--- BLOCK: --->
<div class="container mt-2 mb-2">
    <div class="row">

        <!--- Мета: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">
            <div class="">
                @include('pages.search.search-params', [])
            </div>
        </div>
        <!--- /Мета --->

        <!--- Контент: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9 p-0">
            @forelse($people as $person) 
                <div class="">
                    @include('pages.search.search-result', $person->toArray())
                </div>
            @empty
                <p>Дописів нема.</p>
            @endforelse
        </div>
        <!--- /Контент --->

    </div> 
</div>
<!--- /BLOCK --->


<div class="container pt-3 d-flex justify-content-center mb-5">
    {{ $people->links('templates.people-list-pagination') }}
</div>





@endsection