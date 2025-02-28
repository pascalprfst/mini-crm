@props(['field'])

@php
    $standardTypes = ['text', 'email', 'tel', 'url'];
@endphp

@if(in_array($field['type'], $standardTypes))
    <input type="{{$field['type']}}" {{$attributes}} />
@endif
