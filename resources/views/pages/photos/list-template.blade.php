<div class="container pt-1 d-flex justify-content-center mb-3">
    {{ $files->links('templates.people-list-pagination') }}
</div>


<div class="container">
    <div class="row">
@forelse($files as $file)
    
<!-- PHOTO: --->
        <div class="col-lg-6 col-sm-12 mb-2">

            <!--- --->
            <div class="d-flex flex-row mb-3">
                <div class="">
                    <div class="image-container-small bg-white border">
                        <a href="{{URL::to('/')}}/{{ $file->path }}" target="_blank"><img src="{{URL::to('/')}}/{{ $file->path }}" width="130px;"></a>
                    </div>
                    <div class="font-size-13 text-center"><a href="{{URL::to('/')}}/person/{{$file->people_id}}/photos/{{$file->id}}">Редагувати</a></div>
                </div>
    
                <div class="flex-fill content-outer p-0 ms-2">
                    <div class="bg-white pt-2 d-flex justify-content-between ps-1"><div class="font-roboto-bold font-size-14 ps-1 pe-1">{{ $file->title }}</div></div>
                    <div class="bg-white content">
                        @include('forms.quill-content', [
                            'id' => 'content-' . $file->id,
                            'value' => $file->content
                        ])
                    </div><div class="border-top">
                        <div class="p-2 bg-light font-size-12 font-roboto-light fc-secondary">
                            Size: {{(ceil($file->size / 1024))}} kb. | Extension: {{$file->extension}} <br>
                            Created at: {{$file->created_at}} <br>
                        </div>
                    </div>
                </div>

           </div>
           <!--- --->



        </div>
<!-- /PHOTO --->
@empty
@endforelse
</div>
</div>

<div class="container pt-3 d-flex justify-content-center mb-5">
    {{ $files->links('templates.people-list-pagination') }}
</div>