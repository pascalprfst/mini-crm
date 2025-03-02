<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Import & Export') }}
        </h2>
    </x-slot>

    <div x-data="{section: 'import'}" x-cloak>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
            <button @click="section = 'import'" class="mr-4">
                <i class="fa-solid fa-cloud-arrow-up text-lg text-slate-800 mr-0.5"></i>
                Import
            </button>

            <button class="text-slate-800 font-medium" @click="section = 'export'">
                <i class="fa-solid fa-cloud-arrow-down text-lg text-slate-800 mr-0.5"></i>
                Export
            </button>
        </div>

        <div x-show="section === 'export'" class="pt-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <livewire:export/>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="section === 'import'" class="pt-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <livewire:import/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
