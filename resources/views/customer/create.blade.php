<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kunden') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="font-bold text-slate-800">Neuen Kunden anlegen</h2>

                    @if(count($fields) > 0)
                        <x-forms.form-template action="{{route('customers.store')}}" :template="$formTemplate"
                                               :fields="$fields" model="Kunden"/>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
