<div x-data="{open: true}" x-cloak :class="open ? 'w-80' : 'w-12'"
     class="h-screen bg-gray-100 relative transition-all duration-200 ease-in-out border-r border-r-gray-300 shadow-sm">
    <i @click="open = !open"
       :class="!open ? 'rotate-180' : 'rotate-0'"
       class="fa-solid fa-circle-chevron-left text-blue-600 text-xl absolute translate-x-1/2 right-0 top-3 cursor-pointer transition-all duration-200 ease-in-out"></i>

    <nav class="mt-16">
        <ul class="px-2">
            <li>
                <a class="flex items-center cursor-pointer hover:bg-gray-50 px-2 h-10 rounded-md mb-2.5">
                    <span class="w-4 h-4 mr-4 grid place-content-center">
                        <i class="fa-solid fa-house text-xl text-blue-600"></i>
                    </span>
                    <span x-show="open" x-transition.duration.100ms class="font-medium relative">Home</span>
                </a>
            </li>
            <li>
                <a class="flex items-center cursor-pointer hover:bg-gray-50 px-2 h-10 rounded-md mb-2.5">
                    <span class="w-4 h-4 mr-4 grid place-content-center">
                        <i class="fa-solid fa-address-book text-xl text-blue-600"></i>
                    </span>
                    <span x-show="open" x-transition.duration.100ms class="font-medium relative">Kotakt</span>
                </a>
            </li>
            <li>
                <a class="flex items-center cursor-pointer hover:bg-gray-50 px-2 h-10 rounded-md mb-2.5">
                    <span class="w-4 h-4 mr-4 grid place-content-center">
                        <i class="fa-solid fa-database text-xl text-blue-600"></i>
                    </span>
                    <span x-show="open" x-transition.duration.100ms
                          class="font-medium relative whitespace-nowrap">Import & Export</span>
                </a>
            </li>
            <li>
                <a class="flex items-center cursor-pointer hover:bg-gray-50 px-2 h-10 rounded-md mb-2.5">
                    <span class="w-4 h-4 mr-4 grid place-content-center">
                        <i class="fa-solid fa-hammer text-xl text-blue-600"></i>
                    </span>
                    <span x-show="open" x-transition.duration.100ms
                          class="font-medium relative whitespace-nowrap">Datenmodellierung</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
