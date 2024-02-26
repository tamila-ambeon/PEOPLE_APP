<div class="history mb-3">

    @include("templates.person.section-title", [ 
        'left' => $date . " [" . $quality . "]", 
        'right' => '[ <a href="'. URL::to("/") .'/person/'. $person->id.'/edit/histories/'.$id.'">редагувати</a> ]'
    ])

    <div class="ps-2 pe-2 bg-white rounded">
        @if($content == null) 
            <div class="p-1 quill-content">Інформації немає.</div>
        @else 
            @include('forms.quill-content', [
                'id' => 'content-' . $id,
                'value' => $content
            ])
        @endif
    </div>
</div>