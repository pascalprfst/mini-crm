@props(['label' => '', 'id' => '', 'name' => '', 'required' => ''])

<div>
    @if($label)
        <div class="relative">
            <label class="text-slate-800 text-sm" for="{{$id}}">
                {{$label}}
                @if($required)
                    <span class="text-red-600 relative -left-0.5">*</span>
                @endif
            </label>
        </div>
    @endif
    <div>
        <input
            name="{{$name}}" {{$id}} {{$required ? 'required' : ''}} {{ $attributes->merge(['class' => 'rounded-md py-2 border border-slate-300 text-base w-full']) }}/>
    </div>

    <div>
        @if ($errors->get($name))
            <ul class="text-sm text-red-600 space-y-1 mt-0.5">
                @foreach ((array) $errors->get($name) as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
