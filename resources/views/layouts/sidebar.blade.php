<div x-data="{open: true}" x-cloak :class="open ? 'w-72' : 'w-12'"
     class="h-screen bg-slate-100 relative transition-all duration-200 ease-in-out border-r border-r-slate-300 shadow-sm">
    <i @click="open = !open"
       :class="!open ? 'rotate-180' : 'rotate-0'"
       class="fa-solid fa-circle-chevron-left text-main text- text-xl absolute translate-x-1/2 right-0 top-2.5 cursor-pointer transition-all duration-200 ease-in-out"></i>

    <nav class="mt-16 px-2">
        <ul>
            <x-sidebar-link icon="fa-solid fa-house" label="Dashboard" href="{{route('dashboard')}}"></x-sidebar-link>
            <x-sidebar-link icon="fa-solid fa-building" label="Kunden" href="{{route('dashboard')}}"></x-sidebar-link>

            <li>
                <a class="flex items-center cursor-pointer hover:bg-slate-50 px-2 h-10 rounded-md mb-2.5">
                    <span class="w-4 h-4 mr-4 grid place-content-center">
                        <i class="fa-solid fa-address-book text-xl text-main"></i>
                    </span>
                    <span x-show="open" x-transition.duration.100ms class="font-medium relative">Kotakte</span>
                </a>
            </li>


            <li>
                <a class="flex items-center cursor-pointer hover:bg-slate-50 px-2 h-10 rounded-md mb-2.5">
                    <span class="w-4 h-4 mr-4 grid place-content-center">
                        <i class="fa-solid fa-database text-xl text-main"></i>
                    </span>
                    <span x-show="open" x-transition.duration.100ms
                          class="font-medium relative whitespace-nowrap">Import & Export</span>
                </a>
            </li>
            <x-sidebar-link icon="fa-solid fa-hammer" label="Datenmodellierung">
            </x-sidebar-link>

            <x-sidebar-link icon="fa-solid fa-file" label="Dateiverwaltung">
            </x-sidebar-link>
        </ul>
        <hr>
        <ul class="mt-2">
            <x-sidebar-link icon="fa-solid fa-gear" label="Einstellungen">
            </x-sidebar-link>
        </ul>
    </nav>
</div>
