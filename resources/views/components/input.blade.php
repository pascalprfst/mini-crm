@props(['label' => '', 'id' => '', 'name' => '', 'required' => ''])

<div>
    @if($label)
        <div class="relative">
            <label class="text-slate-700 text-sm" for="{{$id}}">
                {{$label}}
                @if(isset($required))
                    <span class="text-red-600 relative -left-0.5">*</span>
                @endif
            </label>
        </div>
    @endif
    <div>
        <input
            name="{{$name}}" {{$id}} {{ $attributes->merge(['class' => 'rounded-sm py-1.5 border border-slate-300 text-sm w-full']) }}/>
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
