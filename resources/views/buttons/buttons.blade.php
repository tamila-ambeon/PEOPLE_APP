@extends('forms.form-doc.doc-template')
@section('title', "Кнопочки")
 
@section('content')

<!------- PAGE TITLE: --------->
<div class="row  mt-3 mb-3 ms-2 me-2">
    <div class="col-12 text-center">
        <h2>Кнопочки</h2>
    </div>
</div>
<!--------- /PAGE TITLE ------->


<!---------------->
    <div class="row border mt-3 mb-3 ms-2 me-2">
        <div class="col-6 pt-3">

<code>
<pre>
@@include('buttons.button-template', [
    'id' => '', // ідентифікатор кнопки
    'title' => '', // надпис на кнопці
    'size' => '', // small, middle, big
    'type' => '', // green, red, disabled, default
])
</pre>
</code>
        </div>

        <!------->
        <div class="col-6">
            <div class="d-flex m-1 p-1 ">
                @foreach(['small', 'middle', 'big'] as $size)
                    <div class="m-1">
                    @foreach(['green', 'red', 'disabled' , 'default'] as $type)
                        <div class="mb-1">
                        @include('buttons.button-template', [
                            'title' => 'Ще одна кнопка', 
                            'size' => $size,
                            'type' => $type, 
                        ])
                        </div>
                    @endforeach
                    </div>
                @endforeach

            </div>
        </div>
        <!------->
    </div>
<!---------------->


@endsection
