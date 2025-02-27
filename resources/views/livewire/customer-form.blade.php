<div>
    <x-modal name="addCustomField" aside >
        <h2 class="text-slate-800 font-bold">Neues Feld hinzufügen</h2>

        <form class="mt-4">

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
                <div class="flex flex-wrap gap-2 mt-4">
                    <span class="text-sm bg-slate-50 text-green-500 border border-green-500 px-1.5 rounded-sm cursor-pointer">Text</span>
                    <span class="text-sm bg-slate-50 text-slate-800 border border-slate-300 px-1.5 rounded-sm cursor-pointer">Langer Text</span>
                    <span class="text-sm bg-slate-50 text-slate-800 border border-slate-300 px-1.5 rounded-sm cursor-pointer">E-Mail</span>
                    <span class="text-sm bg-slate-50 text-slate-800 border border-slate-300 px-1.5 rounded-sm cursor-pointer">Datum</span>
                    <span class="text-sm bg-slate-50 text-slate-800 border border-slate-300 px-1.5 rounded-sm cursor-pointer">URL</span>
                    <span class="text-sm bg-slate-50 text-slate-800 border border-slate-300 px-1.5 rounded-sm cursor-pointer">Bild</span>
                    <span class="text-sm bg-slate-50 text-slate-800 border border-slate-300 px-1.5 rounded-sm cursor-pointer">Dokumente</span>
                    <span class="text-sm bg-slate-50 text-slate-800 border border-slate-300 px-1.5 rounded-sm cursor-pointer">Zahl</span>
                    <span class="text-sm bg-slate-50 text-slate-800 border border-slate-300 px-1.5 rounded-sm cursor-pointer">Checkbox</span>
                    <span class="text-sm bg-slate-50 text-slate-800 border border-slate-300 px-1.5 rounded-sm cursor-pointer">Radio Button</span>
                    <span class="text-sm bg-slate-50 text-slate-800 border border-slate-300 px-1.5 rounded-sm cursor-pointer">Dropdown</span>
                    <span class="text-sm bg-slate-50 text-slate-800 border border-slate-300 px-1.5 rounded-sm cursor-pointer">HTML</span>
                </div>
            </div>

            <div class="mt-6">
                <x-primary-button>
                    Formularfeld speichern
                </x-primary-button>
            </div>
        </form>
    </x-modal>

    <div x-data="{edit: false}">

        <div class="pb-2 flex justify-between mb-2">
            <h2 x-show="!edit" class="font-bold text-slate-800">Kunden anlegen</h2>
            <h2 x-show="edit" class="font-bold text-slate-800">Kundenformular bearbeiten</h2>
            <div>
                <i x-show="!edit" @click="edit = true" class="fa-solid fa-pencil text-lg text-slate-800 cursor-pointer"></i>
                <i x-show="edit" @click="edit = false" class="fa-solid fa-eye text-lg text-slate-800 cursor-pointer"></i>
            </div>
        </div>

        <form wire:submit="submitCustomer" class="space-y-4">
            <ul x-sort class="grid grid-cols-3 gap-4">
                @foreach($customFields as $index => $field)
                    <li x-show="edit">
                        <div x-sort:item class="cursor-grab bg-gray-100 p-1.5 rounded-md border-2 border-dotted border-gray-300 relative">
                            <div class="absolute right-2.5 top-2 flex items-center gap-x-2">
                                <i class="fa-solid fa-pencil text-slate-800 cursor-pointer"></i>
                                <i @click="$wire.deleteCustomField({{$field['id']}})" class="fa-solid fa-trash text-red-500 cursor-pointer"></i>
                            </div>
                            <div wire:key="{{$field['id']}}">
                                <label for="{{$field['slug']}}" class="text-sm text-gray-500">{{$field['name']}}</label><br>
                                <input disabled name="{{$field['slug']}}" id="{{$field['slug']}}" class="w-full border-gray-300 rounded-md" />
                            </div>
                        </div>
                    </li>
                    <div x-show="!edit">
                        <li wire:key="{{$field['id']}}">
                            <label for="{{$field['slug']}}" class="text-sm text-gray-500">{{$field['name']}}</label><br>
                            <input wire:model="customFields.{{$index}}.value" name="{{$field['slug']}}" id="{{$field['slug']}}" class="w-full border-gray-300 rounded-md" />
                        </li>
                    </div>
                @endforeach
                <li x-show="edit" class="bg-gray-100 p-1.5 rounded-md border-2 border-dotted border-gray-300 grid place-content-center cursor-pointer">
                    <div @click="$dispatch('open-modal', {name: 'addCustomField'})" class="text-sm text-gray-500 font-medium items-center">
                        <i class="fa-solid fa-plus text-lg text-gray-500 font-medium mr-1.5"></i>
                        Neues Feld hinzufügen
                    </div>
                </li>
            </ul>

            <div x-show="!edit" class="mt-6">
                <x-primary-button>Speichern</x-primary-button>
            </div>

            <div x-show="edit" class="flex justify-end">
                <x-primary-button>Formular speichern</x-primary-button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('customerForm', () => ({
                open: false,

            }))
        })
    </script>
</div>
