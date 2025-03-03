@props(['field'])

@php
    $standardTypes = ['text', 'email', 'tel', 'url' ,'date' , 'number'];
@endphp

    <!-- Basic Fields -->
@if(in_array($field['type'], $standardTypes))
    <div>
        <label for="{{$field['slug']}}" class="text-sm font-medium text-slate-600">
            {{$field['name']}}
            @if($field['required'])
                <span class="text-red-500 relative -left-0.5">*</span>
            @endif
        </label>
        <div>
            <input type="{{$field['type']}}" id="{{$field['slug']}}" value="{{old($field['slug'])}}"
                   name="{{$field['slug']}}"
                   {{$attributes}} class="w-full border-slate-300 px-2 py-1.5 rounded-md cursor-pointer"/>
        </div>
        <div>
            @if ($errors->get($field['slug']))
                <ul class="text-sm text-red-600 space-y-1 mt-0.5">
                    @foreach ((array) $errors->get($field['slug']) as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endif

<!-- Textarea -->
@if($field['type'] === 'longtext')
    <div>
        <label for="{{$field['slug']}}" class="text-sm font-medium text-slate-600">
            {{$field['name']}}
            @if($field['required'])
                <span class="text-red-500 relative -left-0.5">*</span>
            @endif
        </label>
        <div>
            <textarea id="{{$field['slug']}}" name="{{$field['slug']}}"
                      class="w-full border-slate-300 px-2 py-1.5 rounded-md"></textarea>
        </div>
        <div>
            @if ($errors->get($field['slug']))
                <ul class="text-sm text-red-600 space-y-1 mt-0.5">
                    @foreach ((array) $errors->get($field['slug']) as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endif

<!-- Image -->
@if($field['type'] === 'image')
    <div>

    </div>
@endif



