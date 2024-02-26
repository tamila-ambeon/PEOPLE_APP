@extends('forms.form-doc.doc-template')
@section('title', "Radio field")
 
@section('content')

<!------- PAGE TITLE: --------->
<div class="row  mt-3 mb-3 ms-2 me-2">
    <div class="col-12 text-center">
        <h2>Radio field</h2>
    </div>
</div>
<!--------- /PAGE TITLE ------->


<!---------------->
<div class="row border mt-3 mb-3 ms-2 me-2">
    <div class="col-6 pt-3">

<code>
<pre>@@include('forms.radio', [
    'id' => "gender",  
    "disabled" => false,
    'items' => [0 => "Жінка", 1 => "Чоловік"], // value => label
    'checked_value' => 1
])</pre>
</code>
    </div>
    <div class="col-6">
        <div class="m-1 p-1 ">
            @include('forms.radio', [
                'id' => "gender",
                'items' => [0 => "Жінка", 1 => "Чоловік"],  
                'checked_value' => 0  
            ])
        </div>

    </div>
</div>
<!---------------->

@endsection