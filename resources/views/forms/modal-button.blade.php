<?php
$types = [
    'green' => 'v-btn-green',
    'red' => 'v-btn-red',
    'disabled' => 'v-btn-disabled',
    'default' => 'v-btn-default',
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
    'default' => 'v-btn-small',
    'small' => 'v-btn-small',
    'middle' => 'v-btn-middle',
    'big' => 'v-btn-big',
];

if(isset($size)) {
    if(array_key_exists($size, $sizes)) {
        $sizeClass = $sizes[$size];
    } else {
        $sizeClass = 'v-btn-small';
    }
}
?>
<!-- Кнопка: @if(isset($title)){{$title}}@else Без назви @endif --->
<div @if(isset($id))id="{{$id}}" @endif class="v-button" @if(isset($form_id))form-id="{{$form_id}}"@endif data-bs-toggle="modal" data-bs-target="#{{$modal_id}}">
    <div class="v-button-inner {{$typeClass}} {{$sizeClass}}">@if(isset($title)){{$title}}@else Без назви @endif</div>
</div>
<!-- /Кнопка: @if(isset($title)){{$title}}@else Без назви @endif --->



