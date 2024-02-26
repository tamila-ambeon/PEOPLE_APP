<div class="container-fluid">
    <div class="row">
        <div @if(isset($id))id="{{$id}}" @endif></div>
    </div>
</div>

<script>

@if(isset($id))
    TextEditors.getInstance().createQuill("{{$id}}", {
        @if(isset($readonly)) @if($readonly) readonly: true @else readonly: false @endif @endif
    })

    @if(isset($value))
        @php
            $jsonIsValid = false;
            $testValue = json_decode($value);

            if (json_last_error() === JSON_ERROR_NONE) {
                // JSON is valid
                $jsonIsValid = true;
            }
        @endphp

        @if($jsonIsValid)
            TextEditors.getInstance().setContent("{{$id}}", {!! $value !!})
        @else
            console.error("Quill: Delta object is not valid JSON.", "id#{{$id}}")
        @endif
    @endif
@else 
@endif

</script>