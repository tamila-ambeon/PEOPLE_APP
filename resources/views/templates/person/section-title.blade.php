<div class="info-block-title">
    <div class="info-block-first-level">
        <div class="info-block-title-left">
            {!! $left !!}
        </div>
        <div class="info-block-title-right">
            {!! $right !!}
        </div>
    </div>
    @if(isset($description))
    <div class="info-block-first-level">
        <div class="info-block-description">{{$description}}</div>
    </div>
    @endif
    

</div>