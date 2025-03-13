@props(['heading'])

<section class="bg-white shadow-sm sm:rounded-md">
    @if(isset($heading))
        <div class="px-6 py-3 bg-gradient-to-r from-main via-main-light [70%] to-sub bg-opacity-90">
            <h2 class="font-semibold text-white">{{$heading}}</h2>
        </div>
    @endif
    <div class="px-6 py-4">
        {{$slot}}
    </div>
</section>
