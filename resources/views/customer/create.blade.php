<x-app-layout>
    <div class="py-6">
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
</x-app-layout>
