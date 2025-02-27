@props(['aside' => false, 'name' => '', ])

<div x-cloak x-show="show"
     x-data="{ show: false, name: '{{ $name }}' , content: '' }"
     x-on:open-modal.window="if ($event.detail.name === name) { show = true; content = $event.detail.content }"
     x-on:close-modal.window="show = false"
     class="fixed inset-0 z-40 w-full flex justify-center items-center
     ">

    <!-- Background Overlay -->
    <div @click="show = false" x-transition.opacity class="fixed cursor-pointer inset-0 bg-black opacity-40"></div>

    @if($aside)
        <!-- Aside Modal -->
        <aside x-show="show"
               x-transition:enter="transition ease-out duration-500"
               x-transition:enter-start="translate-x-full"
               x-transition:enter-end="translate-x-0"
               x-transition:leave="transition ease-in duration-500"
               x-transition:leave-start="translate-x-0"
               x-transition:leave-end="translate-x-full"
               class="fixed h-screen bg-white right-0 z-50 w-2/6 shadow-md ">
            <i @click="show = false"
               class="fa-regular text-2xl text-zinc-500 cursor-pointer absolute top-4 right-4 fa-circle-xmark"></i>
            <div class="px-8 py-16">
                {{$slot}}
            </div>
        </aside>
    @else
        <!-- Standard Modal -->
        <div x-show="show" x-transition
             class="z-50 relative bg-background w-full max-w-lg p-6 shadow-md rounded-sm">
            <i @click="show = false"
               class="fa-solid text-lg text-zinc-500 cursor-pointer absolute top-4 right-4 fa-circle-xmark"></i>
            {{$slot}}
        </div>
    @endif
</div>
