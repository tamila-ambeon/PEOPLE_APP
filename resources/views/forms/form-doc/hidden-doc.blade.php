
@extends('forms.form-doc.doc-template')
@section('title', "Hidden field")
 
@section('content')

<!------- PAGE TITLE: --------->
<div class="row  mt-3 mb-3 ms-2 me-2">
    <div class="col-12 text-center">
        <h2>Hidden field</h2>
    </div>
</div>
<!--------- /PAGE TITLE ------->


<!---------------->
    <div class="row border mt-3 mb-3 ms-2 me-2">
        <div class="col-6 pt-3">

<code>
<pre>@@include('forms.hidden', [
    'id' => "id", 
    'value' => 42
])</pre>
</code>
        </div>
        <div class="col-6">
            <div class="d-flex m-1 p-1 ">
                @include('forms.hidden', [
                    'id' => "id", 
                    'value' => 42
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