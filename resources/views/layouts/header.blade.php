<div x-data="{menuOpen: false}"
     class="h-10 border-b border-neutral-300 bg-neutral-100 shadow-sm flex justify-end items-center py-2 px-6">
    <div @click="menuOpen = !menuOpen"
         class="text-sm text-neutral-500 pl-2 border-l border-neutral-300 cursor-pointer hover:text-neutral-600">
        <span class="relative -top-px">
            {{Auth::user()->email}}
        </span>
        <i :class="menuOpen ? 'rotate-180' : 'rotate-0'"
           class="fa-solid fa-chevron-down relative -top-px ml-0.5 transition-all duration-300 ease-in-out"></i>
    </div>
</div>
