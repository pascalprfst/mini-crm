<x-modal name="addCustomField" aside>
    <h2 class="text-slate-800 font-bold">Neues Feld hinzufügen</h2>

    <div class="mt-4">
        <h3 class="text-slate-800 font-medium">Feldtyp</h3>
        <div class="flex flex-wrap gap-2.5 mt-4">
            @foreach($fieldTypes as $type)
                <div>
                    <label for="type-{{$type['type']}}" @click="type = '{{$type['type']}}'"
                           x-bind:class="type === '{{$type['type']}}' ? 'border border-green-500 text-green-500' : 'border border-slate-300' "
                           class="text-sm bg-slate-50 px-1.5 rounded-sm cursor-pointer">
                        {{$type['name']}}
                    </label>

                    <input wire:click="selectForm('{{$type['type']}}')" type="radio" id="type-{{$type['type']}}"
                           name="type" value="{{$type['type']}}"
                           class="hidden"
                           x-model="type"/>
                </div>
            @endforeach
        </div>
    </div>

    @if($form)
        {!! $form !!}
    @endif
</x-modal>
