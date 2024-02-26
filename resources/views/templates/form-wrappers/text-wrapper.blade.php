
@if(isset($title))
    @if($title != null)
        <div class="input-title">
            {{$title}}
        </div>
    @endif
@endif

@include('forms.text', $input_param)

@if(isset($description))
    @if($description != null)
        <div class="input-description">
            {{$description}}
        </div>
    @endif
@endif

