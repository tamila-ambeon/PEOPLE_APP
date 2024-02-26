@extends('forms.form-doc.doc-template')
@section('title', "Select field")
 
@section('content')

<!------- PAGE TITLE: --------->
<div class="row  mt-3 mb-3 ms-2 me-2">
    <div class="col-12 text-center">
        <h2>Select field</h2>
    </div>
</div>
<!--------- /PAGE TITLE ------->


<!---------------->
<div class="row border mt-3 mb-3 ms-2 me-2">
    <div class="col-6 pt-3">

<code>
<pre>@@include('forms.select', [
    'id' => "gender",  
    'items' => [0 => "Жінка", 1 => "Чоловік"],
    "disabled" => false,
    'selected_value' => 1
])</pre>
</code>
    </div>
    <div class="col-6">
        <div class="d-flex m-1 p-1 ">
            @include('forms.select', [
                'id' => "gender",  
                'items' => [0 => "Жінка", 1 => "Чоловік"],
                'selected_value' => 1
            ])
        </div>

    </div>
</div>
<!---------------->

@endsection