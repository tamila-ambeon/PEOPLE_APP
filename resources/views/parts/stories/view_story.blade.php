<!--- BLOCK: --->
<div class="container mt-3 mb-3">
    <div class="row">

        <!--- Мета: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">
            <div class="">
                <div class="font-roboto-bold font-size-17">{{\Carbon\Carbon::parse($date)->format('j F Y')}}</div>
                <div class="font-roboto font-size-14 fc-secondary mb-1">
                    
                    @if($quality > 0) <span class="badge text-bg-success">{{$quality}}</span> 
                    @elseif($quality < 0) <span class="badge text-bg-danger">{{$quality}}</span>
                    @else <span class="badge text-bg-light">{{$quality}}</span>
                    @endif 
                    {{config('people.story_quality_text')[$quality]}}
                </div>
            </div>
        </div>
        <!--- /Мета --->

        <!--- Контент: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9 p-0 border @if($quality > 0) border-success @elseif($quality < 0) border-danger @else @endif ">
            <div class="bg-light">
                @if($content == null) 
                    <div class="p-1 quill-content">Інформації немає.</div>
                @else 
                    @include('forms.quill-content', [
                        'id' => 'content-' . $id,
                        'value' => $content
                    ])
                @endif
                
            </div>
            <div class="bg-light border-top ps-2 pe-2 font-size-12 pt-1 pb-1 d-flex flex-row-reverse @if($quality > 0) border-success @elseif($quality < 0) border-danger @else @endif">
                <a href="{{URL::to("/")}}/person/{{$person->id}}/stories/{{$id}}">редагувати</a>
            </div>
        </div>
        <!--- /Контент --->

    </div> 
</div>
<!--- /BLOCK --->