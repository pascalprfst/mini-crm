<!-- Customer Sidebar Component -->
<div x-data="{ customerSidebarOpen: false }"
     x-cloak
     :class="customerSidebarOpen ? 'w-[320px]' : 'w-[40px]'"
     class="bg-slate-50 fixed right-0 top-[40px] rounded-bl-md transition-all duration-200 ease-in-out border-l border-l-slate-200 shadow-sm">
    <div x-show="!customerSidebarOpen" class="w-full flex flex-col justify-center items-center gap-4 py-4">
        <i @click="customerSidebarOpen = true"
           class="fa-solid fa-address-book text-xl text-main cursor-pointer hover:text-main-light"></i>
        <i @click="customerSidebarOpen = true"
           class="fa-solid fa-note-sticky text-xl text-main cursor-pointer hover:text-main-light"></i>
        <i @click="customerSidebarOpen = true"
           class="fa-solid fa-calendar text-xl text-main cursor-pointer hover:text-main-light"></i>
    </div>


    <div x-show="customerSidebarOpen" :class="customerSidebarOpen ? 'opacity-100' : 'opacity-0'"
         class="p-4 transition-opacity duration-200">

        <div class="space-y-4">
        </div>
    </div>
</div>
