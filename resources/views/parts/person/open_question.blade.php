<!--- BLOCK: --->
<div class="container mt-3 mb-3">
    <div class="row">

        <!--- Мета: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">
            <div class="">
                <div class="font-roboto-bold font-size-19">{{$title}}</div>
                <div class="font-roboto-light font-size-12 fc-secondary">{!! $description !!}</div>
            </div>
        </div>
        <!--- /Мета --->

        <!--- Контент: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9 p-0">
            <div class="bg-white border mt-1">
                <div class="">
                    @if($person->resume != null) 
                        @include('forms.quill-content', [
                            'id' => $field,
                            'value' => $person->$field
                        ])  
                    @endif
                </div>
                <div class="">
                    <div class="d-flex flex-row-reverse ps-2 pe-2 font-size-14 edit-button-outer border-top">
                        <a href="{{URL::to("/")}}/person/{{$person->id}}/open_answer/{{$field}}">редагувати</a>
                    </div> 
                </div>
            </div>
        </div>
        <!--- /Контент --->

    </div> 
</div>
<!--- /BLOCK --->