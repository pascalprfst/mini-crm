<x-app-layout>
    <x-section heading="Kundenübersicht">
        <div class="mt-2 mb-4 h-10 border border-slate-300">

        </div>
        <div class="relative mb-4">
            <table class="w-full text-sm text-left">
                <thead class="text-sm bg-main-light text-white">
                <tr>
                    @foreach($fields as $field)
                        <th scope="col" class="px-5 py-2.5">
                            {{ __('form-fields.' . $field['field_name']) != 'form-fields.' . $field['field_name'] ? __('form-fields.' . $field['field_name']) : $field['field_name'] }}
                        </th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                @foreach($customers as $customer)
                    <tr class="border-b odd:bg-slate-100 even:bg-white text-slate-800 dark:border-slate-700 border-slate-200">
                        @foreach($fields as $field)
                            <th scope="row" class="px-5 py-3 font-medium whitespace-nowrap">
                                {{$customer[$field['slug']]}}
                            </th>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </x-section>
</x-app-layout>
