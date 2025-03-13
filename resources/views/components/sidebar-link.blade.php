@props(['icon', 'label', 'href'])

<li x-data="{showSubMenu: false}" @mouseover="showSubMenu = true" @mouseleave="showSubMenu = false"
    class="relative">
    <a href="{{isset($href) ? $href : '#'}}"
       class="flex items-center cursor-pointer hover:bg-white px-2 h-10 rounded-md mb-2.5">
        @if(isset($icon))
            <span class="w-4 h-4 mr-4 grid place-content-center">
                <i class="{{$icon}} text-xl text-main"></i>
            </span>
        @endif
        <span x-show="open" x-transition.duration.100ms
              class="font-medium text-slate-800 text-base relative whitespace-nowrap">{{$label}}</span>
    </a>

    @if(!$slot->isEmpty())
        <div x-show="showSubMenu"
             class="w-72 h-28 px-5 absolute top-0 right-0 translate-x-full cursor-pointer">
            <div class="w-full h-full bg-slate-100 border border-slate-200 rounded-sm">
                {{$slot}}
            </div>
        </div>
    @endif
</li>
