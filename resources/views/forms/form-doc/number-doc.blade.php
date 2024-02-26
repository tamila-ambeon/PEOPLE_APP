@extends('forms.form-doc.doc-template')
@section('title', "Number field")
 
@section('content')

<!------- PAGE TITLE: --------->
<div class="row  mt-3 mb-3 ms-2 me-2">
    <div class="col-12 text-center">
        <h2>Number field</h2>
    </div>
</div>
<!--------- /PAGE TITLE ------->


<!---------------->
    <div class="row border mt-3 mb-3 ms-2 me-2">
        <div class="col-6 pt-3">

<code>
<pre>@@include('forms.number', [
    'id' => "name", 
    'placeholder' => "Ім'я", 
    "min" => "10", 
    "max" => "50", 
    "step" => "0.1",
    "readonly" => true, 
    "disabled" => false,
    'value' => 10
])</pre>
</code>
        </div>
        <div class="col-6">
            <div class="d-flex m-1 p-1 ">
                @include('forms.number', [
                        'id' => "name",  
                        'placeholder' => "Ім'я", 
                        "min" => "7", 
                        "max" => "11", 
                        "step" => "0.1",
                        'value' => 10
                    ])
            </div>

        </div>
    </div>
<!---------------->





<!------- SUBTITLE: --------->
<div class="row  mt-3 mb-3 ms-2 me-2">
    <div class="col-12">
        <h4>Як отримати дані в JS і передати на сервер?</h4>
    </div>
</div>
<!--------- /SUBTITLE ------->


@endsection