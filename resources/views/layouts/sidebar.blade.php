<div x-data="{open: $persist(true)}" x-cloak :class="open ? 'w-72' : 'w-12'"
     class="h-screen bg-slate-50 relative transition-all duration-200 ease-in-out border-r border-r-slate-300 shadow-sm">
    <i @click="open = !open"
       :class="!open ? 'rotate-180' : 'rotate-0'"
       class="fa-solid fa-circle-chevron-left text-main text- text-xl absolute translate-x-1/2 right-0 top-2.5 z-20 cursor-pointer transition-all duration-200 ease-in-out"></i>

    <nav class="mt-16 px-2">
        <ul>
            <x-sidebar-link icon="fa-solid fa-house" label="Dashboard" href="{{route('dashboard')}}"></x-sidebar-link>
            <x-sidebar-link icon="fa-solid fa-building" label="Kunden" href="{{route('dashboard')}}">
                <a href="{{route('customers.index')}}"
                   class="flex items-center cursor-pointer hover:bg-gray-200 px-2 h-8 rounded-sm mb">
                    <span
                        class="font-medium text-slate-800 text-base relative whitespace-nowrap">Kunden</span>
                </a>
                <a href="{{route('customers.create')}}"
                   class="flex items-center cursor-pointer hover:bg-gray-200 px-2 h-8 rounded-sm mb">
                    <span
                        class="font-medium text-slate-800 text-base relative whitespace-nowrap">Kunden anlegen</span>
                </a>
            </x-sidebar-link>

            <x-sidebar-link icon="fa-solid fa-address-book" label="Kontakte"
                            href="{{route('dashboard')}}">
                <a href="{{route('customers.index')}}"
                   class="flex items-center cursor-pointer hover:bg-gray-200 px-2 h-8 rounded-sm mb">
                    <span
                        class="font-medium text-slate-800 text-base relative whitespace-nowrap">Kontakte</span>
                </a>
                <a href="{{route('customers.create')}}"
                   class="flex items-center cursor-pointer hover:bg-gray-200 px-2 h-8 rounded-sm mb">
                    <span
                        class="font-medium text-slate-800 text-base relative whitespace-nowrap">Kontakt anlegen</span>
                </a>
            </x-sidebar-link>

            <x-sidebar-link icon="fa-solid fa-calendar-days" label="Kalender"
                            href="{{route('calendar')}}"></x-sidebar-link>


            <x-sidebar-link icon="fa-solid fa-database" label="Import & Export"
                            href="{{route('dashboard')}}">
                <a href="{{route('import')}}"
                   class="flex items-center cursor-pointer hover:bg-gray-200 px-2 h-8 rounded-sm mb">
                    <span
                        class="font-medium text-slate-800 text-base relative whitespace-nowrap">Import</span>
                </a>
                <a href="{{route('export')}}"
                   class="flex items-center cursor-pointer hover:bg-gray-200 px-2 h-8 rounded-sm mb">
                    <span
                        class="font-medium text-slate-800 text-base relative whitespace-nowrap">Export</span>
                </a>
                <a href="{{route('imports-exports.index')}}"
                   class="flex items-center cursor-pointer hover:bg-gray-200 px-2 h-8 rounded-sm mb">
                    <span
                        class="font-medium text-slate-800 text-base relative whitespace-nowrap">Meine Importe & Exporte</span>
                </a>
            </x-sidebar-link>

            <x-sidebar-link icon="fa-solid fa-hammer" label="App Builder">
                <a href="{{route('form-builder')}}"
                   class="flex items-center cursor-pointer hover:bg-gray-200 px-2 h-8 rounded-sm mb">
                    <span
                        class="font-medium text-slate-800 text-base relative whitespace-nowrap">Formular Builder</span>
                </a>
                <a href="{{route('table-builder')}}"
                   class="flex items-center cursor-pointer hover:bg-gray-200 px-2 h-8 rounded-sm mb">
                    <span
                        class="font-medium text-slate-800 text-base relative whitespace-nowrap">Tabellen Builder</span>
                </a>
            </x-sidebar-link>
        </ul>
        <hr>
        <ul class="mt-2">
            <x-sidebar-link icon="fa-solid fa-gear" label="Einstellungen">
            </x-sidebar-link>
        </ul>
    </nav>
</div>
