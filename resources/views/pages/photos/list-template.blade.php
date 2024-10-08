<div class="container pt-3 d-flex justify-content-center mb-5">
    {{ $files->links('templates.people-list-pagination') }}
</div>

@forelse($files as $file)

    <div class="photo-outer  mb-3">
        <div class="photo-inner d-flex justify-content-start">
            <div class="image-outer">
                <a href="{{URL::to('/')}}/{{ $file->path }}" target="_blank"><img src="{{URL::to('/')}}/{{ $file->path }}" width="130px;"></a>
            </div>
            <div class="bg-white flex-fill content-outer p-3">
                <div class="d-flex justify-content-between">
                    <div class="title">{{ $file->id }}. {{ $file->title }}</div>
                    <div class="title-edit"><a href="{{URL::to('/')}}/person/{{$file->people_id}}/photos/{{$file->id}}">Редагувати #{{ $file->id }}</a></div>
                </div>
               
                <div class="content">
                    @include('forms.quill-content', [
                        'id' => 'content-' . $file->id,
                        'value' => $file->content
                    ])
                </div>
                
            </div>
        </div>
    </div>
@empty
    <p>Немає фотографій.</p>
@endforelse

<div class="container pt-3 d-flex justify-content-center mb-5">
    {{ $files->links('templates.people-list-pagination') }}
</div>