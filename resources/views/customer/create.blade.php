<x-app-layout>
    <x-section heading="Kunden anlegen">
        @if(count($fields) > 0)
            <x-forms.form-template action="{{route('customers.store')}}" :labelGroups="$labelGroups"
                                   :template="$formTemplate"
                                   :fields="$fields" model="Kunden"/>
        @endif
    </x-section>
</x-app-layout>
