@extends('forms.form-doc.doc-template')
@section('title', "Text editor")
 
@section('content')

<!------- PAGE TITLE: --------->
<div class="row  mt-3 mb-3 ms-2 me-2">
    <div class="col-12 text-center">
        <h2>Text editor</h2>
    </div>
</div>
<!--------- /PAGE TITLE ------->


<!---------------->
    <div class="row border mt-3 mb-3 ms-2 me-2">
        <div class="col-3 pt-3">

<code>
<pre>@@include('forms.text-editor', [
    'id' => "name", 
    'placeholder' => "...", 
    "readonly" => true, 
    "disabled" => false,
    'value' => 'hello world!'
])</pre>
</code>
        </div>
        <div class="col-9 pb-5">
            <div class="">
                @include('forms.text-editor', [
                    'id' => "name", 
                    'placeholder' => "...", 
                    "readonly" => true,
                    'value' => 'hello world!'
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