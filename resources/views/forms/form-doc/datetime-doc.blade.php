@extends('forms.form-doc.doc-template')
@section('title', "Datetime picker")
 
@section('content')

<!------- PAGE TITLE: --------->
<div class="row  mt-3 mb-3 ms-2 me-2">
    <div class="col-12 text-center">
        <h2>Datetime picker</h2>
    </div>
</div>
<!--------- /PAGE TITLE ------->


<!---------------->
<div class="row border mt-3 mb-3 ms-2 me-2">
    <div class="col-6 pt-3">

<code>
<pre>@@include('forms.datetime-picker', [
    'id' => "name",
    "disabled" => false,
    'value' => "2023-12-12T19:30" // format: YYYY-MM-DDTHH:MM
])</pre>
</code>
    </div>
    <div class="col-6">
        <div class="m-1 p-1 ">
            @include('forms.datetime-picker', ['id' => "date", 'value' => "2023-12-12T19:30"])
        </div>

    </div>
</div>
<!---------------->

@endsection