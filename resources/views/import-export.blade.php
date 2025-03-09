<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Import & Export') }}
        </h2>
    </x-slot>

    <div x-data="{section: 'import'}" x-cloak>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
            <button @click="section = 'import'" :class="section === 'import' ? 'text-blue-600' : 'text-slate-800'"
                    class="mr-4">
                <i class="fa-solid fa-cloud-arrow-up text-lg mr-0.5"></i>
                Import
            </button>

            <button :class="section === 'export' ? 'text-blue-600' : 'text-slate-800'" @click="section = 'export'"
                    class="mr-4">
                <i class="fa-solid fa-cloud-arrow-down text-lg mr-0.5"></i>
                Export
            </button>

            <button :class="section === 'my-imports' ? 'text-blue-600' : 'text-slate-800'"
                    @click="section = 'my-imports'">
                <i class="fa-solid fa-cloud text-lg mr-0.5"></i>
                Meine Imports
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
