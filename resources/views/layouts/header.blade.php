<div x-data="{menuOpen: false}"
     class="h-10 border-b border-slate-300 bg-slate-100 shadow-sm flex justify-end items-center py-2 px-6">
    <i class="fa-solid fa-bell mr-2 text-main cursor-pointer hover:text-main-light"></i>
    <div @click="menuOpen = !menuOpen"
         class="text-sm text-slate-500 pl-2 border-l border-slate-300 cursor-pointer hover:text-slate-600">
        <span class="relative -top-px">
            {{Auth::user()->email}}
        </span>
        <i :class="menuOpen ? 'rotate-180' : 'rotate-0'"
           class="fa-solid fa-chevron-down relative -top-px ml-0.5 transition-all duration-300 ease-in-out"></i>
    </div>
</div>
