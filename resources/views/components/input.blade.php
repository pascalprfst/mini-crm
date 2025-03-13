@props(['name', 'id', 'required', 'label'])

<div>
    @if(isset($label))
        <label for="{{$id}}">{{$label}}</label>
    @endif
    <input {{$attributes}} id="{{$id}}" name="{{$name}}" class="border border-slate-300 rounded-sm"/>
</div>
