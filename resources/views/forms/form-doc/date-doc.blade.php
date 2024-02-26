@extends('forms.form-doc.doc-template')
@section('title', "Date picker")
 
@section('content')

<!------- PAGE TITLE: --------->
<div class="row  mt-3 mb-3 ms-2 me-2">
    <div class="col-12 text-center">
        <h2>Date picker</h2>
    </div>
</div>
<!--------- /PAGE TITLE ------->


<!---------------->
<div class="row border mt-3 mb-3 ms-2 me-2">
    <div class="col-6 pt-3">

<code>
<pre>@@include('forms.datepicker', [
    'id' => "name",
    "disabled" => false,
    'value' => "2023-12-12" // format: YYYY-MM-DD
])</pre>
</code>
    </div>
    <div class="col-6">
        <div class="m-1 p-1 ">
            @include('forms.datepicker', ['id' => "date", 'value' => "2023-12-12"])
        </div>

    </div>
</div>
<!---------------->

@endsection