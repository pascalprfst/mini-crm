<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div x-cloak x-data="{section: 'formBuilder'}">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
            <button @click="section = 'formBuilder'"
                    :class="section === 'formBuilder' ? 'text-blue-600' : 'text-slate-800'"
                    class="mr-4">
                <i class="fa-solid fa-align-justify text-lg mr-0.5"></i>
                Form Builder
            </button>

            <button :class="section === 'tableBuilder' ? 'text-blue-600' : 'text-slate-800'"
                    @click="section = 'tableBuilder'">
                <i class="fa-solid fa-table-list text-lg mr-0.5"></i>
                Table Builder
            </button>
        </div>

        <div x-show="section === 'formBuilder'" class="pt-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <livewire:model-form-builder/>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="section === 'tableBuilder'" class="pt-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <livewire:table-builder/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
