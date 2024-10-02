<!--- BLOCK: --->
<div class="container mt-3 mb-3">
    <div class="row">

        <!--- Мета: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">
            <div class="">
                <div class="font-roboto-bold font-size-19">{{config('people.pages_description.' . $field . '.title')}}</div>
                <div class="font-roboto-light font-size-12 fc-secondary">{!! config('people.pages_description.' . $field . '.description') !!}</div>
            </div>
        </div>
        <!--- /Мета --->

        <!--- Контент: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9 p-0">
            <div class="bg-light border">
                <div class="d-flex flex-row">
                    <div class="d-flex flex-row p-1">
                        @include('parts.person.select_with_autosave', ['field' => $field])
                    </div>
                </div>
            </div>
        </div>
        <!--- /Контент --->

    </div> 
</div>
<!--- /BLOCK --->