<x-section heading="Kundenübersicht">
    <div class="mt-2 mb-4 flex items-end">
        <x-input type="text" id="search" name="search" wire:model.live.debounce="search" placeholder="Suche..."/>
        
        <a href="{{route('customers.create')}}" class="ml-auto">
            <x-sub-button>
                <i class="fa-solid fa-plus text-slate-800 font-semibold"></i>
                <span class="ml-1.5">Kunden anlegen</span>
            </x-sub-button>
        </a>
    </div>
    <div>
        <table class="rounded-md  text-sm text-left overflow-hidden w-full">
            <thead class="text-sm bg-black text-white">
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
                            @if($field['slug'] === 'name')
                                <a href="{{route('customers.show' , $customer->id)}}"
                                   class="cursor-pointer">{{$customer[$field['slug']]}}</a>
                            @else
                                {{$customer[$field['slug']]}}
                            @endif

                            @if($field['custom_field'])
                                @if(isset($customer['custom_fields'][$field['slug']]))
                                    {{$customer['custom_fields'][$field['slug']]['value']}}
                                @endif
                            @endif
                        </th>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mt-6">
            {{$customers->links()}}
        </div>
    </div>
</x-section>
