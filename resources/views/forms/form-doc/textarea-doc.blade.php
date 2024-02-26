@extends('forms.form-doc.doc-template')
@section('title', "Textarea field")
 
@section('content')

<!------- PAGE TITLE: --------->
<div class="row  mt-3 mb-3 ms-2 me-2">
    <div class="col-12 text-center">
        <h2>Textarea field</h2>
    </div>
</div>
<!--------- /PAGE TITLE ------->


<!---------------->
<div class="row border mt-3 mb-3 ms-2 me-2">
    <div class="col-6 pt-3">

<code>
<pre>@@include('forms.textarea', [
    'id' => "gender",  
    'placeholder' => "Ім'я", 
    "minlength" => "1", 
    "maxlength" => "50", 
    "rows" => "3", 
    "cols" => "50", 
    "readonly" => true, 
    "disabled" => false,
    'value' => "Привіт"
])</pre>
</code>
    </div>
    <div class="col-6">
        <div class="d-flex m-1 p-1 ">
            @include('forms.textarea', [
                'id' => "gender",
                "rows" => "3", 
                "cols" => "50", 
                'value' => "Привіт"
            ])
        </div>

    </div>
</div>
<!---------------->

@endsection