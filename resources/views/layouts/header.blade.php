<div x-cloak x-data="{menuOpen: false}"
     class="h-10 border-b border-slate-300 bg-slate-100 shadow-sm flex justify-end items-center py-2 px-6">
    <i class="fa-solid fa-bell mr-2 text-main cursor-pointer hover:text-main-light"></i>
    <div @click="menuOpen = !menuOpen"
         class="text-sm text-slate-500 pl-2 border-l border-slate-300 cursor-pointer hover:text-slate-600 relative">
        <span class="relative -top-px">
            {{Auth::user()->email}}
        </span>
        <i :class="menuOpen ? 'rotate-180' : 'rotate-0'"
           class="fa-solid fa-chevron-down relative -top-px ml-0.5 transition-all duration-300 ease-in-out"></i>
        <div x-show="menuOpen" x-collapse
             class="w-60 bg-slate-100 border border-slate-300 rounded-sm shadow-sm px-4 py-2.5 absolute right-0 top-8">
            <ul>
                <li
                    class="relative">
                    <a href="{{route('profile.edit')}}"
                       class="flex items-center cursor-pointer hover:bg-white p-2 rounded-sm mb-2.5">
                        <i class="fa-solid fa-user text-lg text-main mr-2.5"></i>
                        <span x-show="open" x-transition.duration.100ms
                              class="font-medium text-slate-800 text-sm relative whitespace-nowrap">Profil</span>
                    </a>
                </li>
            </ul>
            <form method="POST" class="flex" action="{{ route('logout') }}">
                @csrf
                <a class="w-full bg-main text-white font-semibold py-1.5 text-center rounded-sm hover:bg-main-light"
                   :href="route('logout')"
                   onclick="event.preventDefault();
                    this.closest('form').submit();">
                    <i class="fa-solid fa-right-from-bracket relative mr-1 top-px"></i>
                    {{ __('Log Out') }}
                </a>
            </form>
        </div>
    </div>
</div>
