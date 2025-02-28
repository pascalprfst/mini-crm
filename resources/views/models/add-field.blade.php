<x-modal name="addCustomField" aside >
    <h2 class="text-slate-800 font-bold">Neues Feld hinzufügen</h2>

    <form x-data="{type: ''}" class="mt-4">

        <label for="fieldname" class="text-sm text-slate-600 relative">
            Feldname<span class="text-red-500">*</span>
        </label>
        <input type="text" id="fieldname" name="fieldname" class="w-full rounded-md border-slate-300 py-1.5" />

        <div x-data="{checked: false}" class="mt-4 flex items-center">
            <div @click="checked = !checked" class="border border-slate-300 rounded-sm w-4 h-4 cursor-pointer mr-1 grid place-content-center">
                <i x-show="checked" class="fa-solid fa-check text-green-500"></i>
            </div>
            <label @click="checked = !checked" for="required" class="text-sm text-slate-600 cursor-pointer">
                Pflichtfeld
            </label>
            <input wire:model="checked" class="hidden" type="checkbox" id="required" name="required" />
        </div>

        <div class="mt-4">
            <h3 class="text-slate-800 font-medium">Formularelemente</h3>
            <div class="flex flex-wrap gap-2.5 mt-4">
                @foreach($fieldTypes as $type)
                    <span @click="type = '{{$type['type']}}'" x-bind:class="type === '{{$type['type']}}' ? 'border border-green-500 text-green-500' : 'border border-slate-300' "  class="text-sm bg-slate-50  px-1.5 rounded-sm cursor-pointer">{{$type['name']}}</span>
                @endforeach
            </div>
        </div>

        <div class="mt-6">
            <x-primary-button>
                Formularfeld speichern
            </x-primary-button>
        </div>
    </form>
</x-modal>
