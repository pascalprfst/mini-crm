<div>
    <form wire:submit="submitCustomer" class="space-y-4">
        <div class="grid grid-cols-3 gap-4">
            <div>
                <label for="name" class="text-sm text-gray-500">Name</label><br>
                <input wire:model="name" name="name" id="name" class="w-full border-gray-300 rounded-sm" />
            </div>

            <div>
                <label for="email" class="text-sm text-gray-500">E-Mail</label><br>
                <input wire:model="email" name="email" id="email" class="w-full border-gray-300 rounded-sm" />
            </div>

            @foreach($customFields as $index => $field)
                <div wire:key="{{$field['id']}}">
                    <label for="{{$field['slug']}}" class="text-sm text-gray-500">{{$field['name']}}</label><br>
                    <input wire:model="customFields.{{$index}}.value" name="{{$field['slug']}}" id="{{$field['slug']}}" class="w-full border-gray-300 rounded-sm" />
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            <button>Speichern</button>
        </div>
    </form>

    <div class="mt-8">
        <h2 class="text-red-500 text-lg font-medium">Kundeninfos</h2>
        @if($customer)
            <div>{{$customer->name}}</div>
            <div>{{$customer->email}}</div>
            @foreach($customerValues as $value)
                
            @endforeach
        @endif
    </div>
</div>
