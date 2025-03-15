@props(['icon', 'label', 'href', 'active' => false])

<li x-data="{showSubMenu: false}" @mouseover="showSubMenu = true" @mouseleave="showSubMenu = false"
    class="relative">
    <a href="{{isset($href) ? $href : '#'}}"
        @class([
            'flex items-center cursor-pointer px-2 h-10 rounded-sm mb-2.5 transition-colors duration-150',
            'bg-slate-100' => $active,
            'hover:bg-white' => !$active
        ])>
        @if(isset($icon))
            <span class="w-4 h-4 mr-4 grid place-content-center">
                <i class="{{$icon}} text-xl text-main"></i>
            </span>
        @endif
        <span x-show="open" x-transition.duration.100ms
              @class([
                  'font-medium text-base relative whitespace-nowrap',
                  'text-main' => $active,
                  'text-slate-800' => !$active
              ])>{{$label}}</span>
    </a>

    @if(!$slot->isEmpty())
        <div x-show="showSubMenu" x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 transform translate-x-2"
             x-transition:enter-end="opacity-100 transform translate-x-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 transform translate-x-0"
             x-transition:leave-end="opacity-0 transform translate-x-2"
             class="absolute z-40 top-0 left-full pl-4"
             style="min-width: 18rem;">
            <div class="w-full bg-slate-50 shadow-sm rounded-md overflow-hidden border border-slate-200">
                <div class="py-2 space-y-0.5">
                    {{$slot}}
                </div>
            </div>
        </div>
    @endif
</li>
