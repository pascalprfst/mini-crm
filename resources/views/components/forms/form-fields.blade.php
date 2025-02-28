@props(['field'])

@php
    $standardTypes = ['text', 'email', 'tel', 'url' ,'date'];
@endphp

@if(in_array($field['type'], $standardTypes))
    <label for="{{$field['slug']}}">{{$field['name']}}</label>
    <input type="{{$field['type']}}" id="{{$field['slug']}}" name="{{$field['slug']}}" {{$attributes}} class=""/>
@endif

