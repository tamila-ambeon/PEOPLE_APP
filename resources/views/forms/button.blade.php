<?php
$types = [
    'green'     => 'v-btn-green',
    'red'       => 'v-btn-red',
    'disabled'  => 'v-btn-disabled',
    'default'   => 'v-btn-default',
];

$typeClass = 'v-btn-default';
if(isset($type)) {
    if(array_key_exists($type, $types)) {
        $typeClass = $types[$type];
    } else {
        $typeClass = 'v-btn-default';
    }
}

$sizeClass = 'v-btn-small';

$sizes = [
    'default'   => 'v-btn-small',
    'small'     => 'v-btn-small',
    'middle'    => 'v-btn-middle',
    'big'       => 'v-btn-big',
];

if(isset($size)) {
    if(array_key_exists($size, $sizes)) {
        $sizeClass = $sizes[$size];
    } else {
        $sizeClass = 'v-btn-small';
    }
}

$displayClass = '';
if(isset($display)) {
    if(!$display) {
        $displayClass = 'd-none';
    }
}

$hasIcon = false;
$iconClass = '';

if(isset($icon)) {
    $hasIcon = true;

    if($icon == 'spinner') {

    }
}
?>
<!-- Кнопка: @if(isset($title)){{$title}}@else Без назви @endif --->
<div @if(isset($id))id="{{$id}}" @endif class="v-button {{$displayClass}}" @if(isset($form_id))form-id="{{$form_id}}"@endif>
    <div class="v-button-inner {{$typeClass}} {{$sizeClass}}">
    @if($hasIcon)
        <div class="d-flex flex-row align-items-center">
            @if($icon == 'spinner')
                <div class="spinner-border spinner-border-sm me-2">
                    <span class="sr-only"></span>
                </div>
            @else 
                <div class=""></div>
            @endif
            <div>@if(isset($title)){{$title}}@else Без назви @endif</div>
        </div>
    @else 
        @if(isset($title)){{$title}}@else Без назви @endif
    @endif
    </div>
    
</div>
<!-- /Кнопка: @if(isset($title)){{$title}}@else Без назви @endif --->



