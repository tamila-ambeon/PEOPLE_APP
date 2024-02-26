@extends('templates.PageTemplate')

@section('title', "Список ознак" )

@section('content')


<!--------- TITLE: ---------->
@include('templates.header', [
    'title' => "Список ознак"
])
<!--------- /TITLE ---------->


<!-------- Кнопка додавання: -------->
<div class="container pt-3 d-flex justify-content-center ">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="d-flex flex-row-reverse">
                <!---------------->
                @include('forms.button', [
                    'id' => 'go-to-create-sign', // ідентифікатор кнопки
                    'title' => 'Додати ознаку', // надпис на кнопці
                    'size' => 'big', // small, middle, big
                    'type' => 'green', // green, red, disabled, default
                ])
        </div>
    </div>
</div>
<script>
    // Редірект при кліку на кнопку створення:
    document.getElementById("go-to-create-sign").onclick = function (event) {
        location.href = "{{URL::to('/')}}/create-sign"
    }
</script>
<!---------- /Кнопка додавання --------->


<div class="container mb-3">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
            <div class="container p-0 mt-3">
                @forelse($signs as $sign) 
                    <div class="bg-white mb-2 p-2 rounded">
                        <a href="{{URL::to('/')}}/sign/{{$sign->id}}">#{{$sign->id}}</a>
                        <a href="{{URL::to('/')}}/sign/{{$sign->id}}">{{$sign->title_men}}</a>
                    </div>
                @empty
                    <p>Дописів нема.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

<div class="container pt-3 d-flex justify-content-center mb-5">
    {{ $signs->links('templates.people-list-pagination') }}
</div>


@endsection