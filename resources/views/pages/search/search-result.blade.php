<div class="container mb-3">
    <div class="row bg-white pb-2 border">

        <div class="me-5 border-bottom pb-2 pt-2 bg-light">
            <a href="{{URL::to('/')}}/person/{{$id}}">@if(isset($surname)){{$surname}}@endif
            @if(isset($name)){{$name}}@endif
            @if(isset($middlename)){{$middlename}}@endif</a>
        </div>

        <!--- BLOCK: --->
        <div class="container mt-3 mb-3">
            <div class="row">

                <!--- Мета: --->
                <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">
                    <div class="">
                        <div class="font-roboto-bold font-size-14">Рішення:</div>
                        <div class="mb-3">@include('parts.person.select_disabled', ['field' => 'decision'])</div>
                        <div class="font-roboto-bold font-size-14">Політичні погляди:</div>
                        <div class="mb-3">
                            <div class="d-flex flex-row p-1">
                                <div class="font-size-13">
                                    @include('parts.person.select_disabled', ['field' => "wing"])
                                </div>
                            </div>
                            <div class="d-flex flex-row p-1">
                                <div class="font-size-13">
                                    @include('parts.person.select_disabled', ['field' => "radicalism"])
                                </div>
                            </div>
                        </div>
                        <div class="font-roboto-bold font-size-14">Круг:</div>
                        <div class="mb-3">
                            <div class="d-flex flex-row p-1">
                                <div class="font-size-13">
                                    @include('parts.person.select_disabled', ['field' => "circle"])
                                </div>
                            </div>
                        </div>


                        <div class="mb-3">

                            <div class="d-flex flex-row">
                                <div class="me-2">
                                    <a class="text-primary" href="{{URL::to('/')}}/person/{{$id}}/photos">Фотографії</a>
                                </div>
                                <div class="mt-1">
                                    <span class="badge text-bg-light">{{$photos_count}}</span>
                                </div>
                            </div>

                            <div class="d-flex flex-row">
                                <div class="me-2">
                                    <a class="text-primary" href="{{URL::to('/')}}/person/{{$person->id}}/stories">Історія стосунків </a>
                                </div>
                                <div class="mt-1">
                                    <div>
                                        @if($relationship_quality > 0) <span class="badge text-bg-success ps-2 pe-2 pt-1 pb-1 font-size-12">{{$relationship_quality}}</span> 
                                        @elseif($relationship_quality < 0) <span class="badge text-bg-danger ps-2 pe-2 pt-1 pb-1 font-size-12">{{$relationship_quality}}</span>
                                        @else <span class="badge text-bg-light ps-2 pe-2 pt-1 pb-1 font-size-12">{{$relationship_quality}}</span>
                                        @endif
                                    </div>

                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
                <!--- /Мета --->

                <!--- Контент: --->
                <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9">
                    <div class="font-roboto-bold font-size-14 border-bottom">Резюме:</div>
                    <div>
                        @if($resume != null) 
                            @include('forms.quill-content', [
                                'id' => 'resume-' . $id,
                                'value' => $resume
                            ])  
                        @endif
                    </div>
                </div>
                <!--- /Контент --->

            </div> 
        </div>
        <!--- /BLOCK --->

    </div>
</div>