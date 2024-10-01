<!--- BLOCK: --->
<div class="container mt-3 mb-3">
    <div class="row">

        <!--- Мета: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">
            <div class="">
                <div class="font-roboto-bold font-size-19">Рішення:</div>
                <div class="font-roboto-light font-size-12 fc-secondary">
                    Чи хочу я цю людину в своєму житті? <br>Варто чи ні мати стосунки з цією людиною.
                </div>
            </div>
        </div>
        <!--- /Мета --->

        <!--- Контент: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9 p-0">
            <div class="bg-white border mt-1">
                <div class="d-flex flex-row">
                    <div class="d-flex flex-row p-1">
                        @include('forms.select', [
                            'id' => "decision",  
                            'items' => config('people.decision'),
                            "disabled" => true,
                            'selected_value' => $person->decision
                        ])
                    </div>
                </div>
                <div class="">
                    <div class="bg-white border-top d-flex flex-row-reverse ps-2 pe-2 font-size-14 edit-button-outer">
                        <a href="{{URL::to("/")}}/person/{{$person->id}}/decision">редагувати</a>
                    </div> 
                </div>
            </div>
        </div>
        <!--- /Контент --->

    </div> 
</div>
<!--- /BLOCK --->