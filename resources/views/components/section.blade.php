@props(['heading'])

<section {{$attributes->merge(['class' => 'bg-white shadow-sm overflow-hidden sm:rounded-md'])}}>
    @if(isset($heading))
        <div class="px-6 py-3 bg-gradient-to-r from-main via-main-light [70%] to-sub bg-opacity-90">
            <h2 class="font-semibold text-white">{{$heading}}</h2>
        </div>
    @endif
    <div class="p-6">
        {{$slot}}
    </div>
</section>
