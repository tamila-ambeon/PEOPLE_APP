<!--- BLOCK: --->
<div class="container mt-3 mb-3">
    <div class="row">

        <!--- Мета: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">
            <div class="">
                <div class="font-roboto-bold font-size-19">Резюме:</div>
                <div class="font-roboto-light font-size-12 fc-secondary">
                    Коротко про те, як взаємодіяти з цією людиною. Якщо людина робила мені добро, або зло - це мати бути тут коротко, щоб розуміти причину мого ставлення.
                </div>
            </div>
        </div>
        <!--- /Мета --->

        <!--- Контент: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9 p-0">
            <div class="bg-white border mt-1">
                <div class="">
                    @if($person->resume != null) 
                        @include('forms.quill-content', [
                            'id' => 'resume',
                            'value' => $person->resume
                        ])  
                    @endif
                </div>
                <div class="">
                    <div class="d-flex flex-row-reverse ps-2 pe-2 font-size-14 edit-button-outer @if($person->resume != null) border-top @endif">
                        <a href="{{URL::to("/")}}/person/{{$person->id}}/resume">редагувати</a>
                    </div> 
                </div>
            </div>
        </div>
        <!--- /Контент --->

    </div> 
</div>
<!--- /BLOCK --->