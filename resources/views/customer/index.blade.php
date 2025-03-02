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

                    @if(count($formFields) > 0)
                        <form method="POST" class="mt-6">
                            @csrf
                            <div class="grid grid-cols-{{$formTemplate->grid_columns ?? '2'}} gap-x-5 gap-y-3 w-full">
                                @foreach($formFields as $field)
                                    <x-forms.form-fields :field="$field"/>
                                @endforeach
                            </div>

                            <div class="mt-6">
                                <x-primary-button>Kunden anlegen</x-primary-button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
