<div x-data="formBuilder($wire)" x-cloak>
    @include('models.add-field')
    @include('models.edit-field')

    <div>
        <div class="pb-2 flex justify-between mb-2">
            <h2 class="font-bold text-slate-800">Formular & Objekt Builder</h2>
        </div>

        <div class="w-1/2 mb-6">
            <label for="model" class="text-sm font-medium text-slate-600">Objekt</label>
            <div>
                <select id="model" name="model" wire:model.live="model"
                        class="w-full border-slate-300 px-2 py-1.5 rounded-md cursor-pointer">
                    <option disabled selected value="">Objekt auswählen</option>
                    <option value="CUSTOMER">Kunden</option>
                    <option value="CONTACTS">Kontakte</option>
                </select>
            </div>
        </div>

        @if($model)
            <form @submit.prevent="saveSettings()" class="space-y-4">
                <div class="flex items-end">
                    <div class="flex items-end gap-x-4">
                        <div>
                            <span class="text-slate-800 text-sm">Anordnung</span>

                            <div class="bg-slate-100 flex border border-slate-300 max-w-fit rounded-md">
                                <div @click="columns = 1"
                                     class="grid place-content-center px-4 py-0.5 rounded-l-md font-medium cursor-pointer hover:bg-slate-200">
                                    |
                                </div>
                                <div @click="columns = 2"
                                     class="grid place-content-center px-4 py-0.5 font-medium border-x border-slate-300 cursor-pointer hover:bg-slate-200">
                                    ||
                                </div>
                                <div @click="columns = 3"
                                     class="grid place-content-center px-4 py-0.5 rounded-r-md font-medium cursor-pointer hover:bg-slate-200">
                                    |||
                                </div>
                            </div>
                        </div>

                        <div @click="$dispatch('open-modal', {name: 'addCustomField'})"
                             class="text-sm text-slate-500 font-medium items-center flex justify-center cursor-pointer py-1.5 hover:text-slate-700">
                            <i class="fa-solid fa-plus text-lg font-medium mr-1.5"></i>
                            Neues Feld hinzufügen
                        </div>

                    </div>
                    <div class="ml-auto">
                        <x-primary-button>Vorlage speichern</x-primary-button>
                    </div>
                </div>

                <ul x-sort
                    :style="'grid-template-columns: repeat(' + columns + ', 1fr)'"
                    class="grid gap-4">
                    <template x-for="field in fields">
                        <li>
                            <div x-sort:item
                                 class="cursor-grab bg-slate-100 p-1.5 rounded-md border-2 border-dotted border-slate-300 relative">
                                <div class="absolute right-2.5 top-2 flex items-center gap-x-2">
                                    <i x-show="field.required"
                                       class="fa-solid fa-triangle-exclamation text-slate-800 font-bold"></i>
                                    <i @click="$dispatch('open-modal', {name: 'editCustomField',  data: '12345' })"
                                       class="fa-solid fa-pencil text-slate-800 cursor-pointer"></i>
                                    <i @click="deactivateField(field.id)"
                                       class="fa-solid fa-ban text-red-500 cursor-pointer"></i>
                                    <i class="fa-solid fa-trash-can text-red-500 cursor-pointer"></i>
                                </div>
                                <div>
                                    <div class="text-sm text-slate-500">
                                        <span class="font-bold">Name:</span> <span x-text="field.name"></span>
                                    </div>
                                </div>
                                <div class="text-sm text-slate-500">
                                    <span class="font-bold">Feldtyp:</span> <span x-text="field.type"></span>
                                </div>
                                <div class="text-sm text-slate-500">
                                    <span class="font-bold">Status:</span> <span>Aktiv</span>
                                </div>
                            </div>
                        </li>
                    </template>
                </ul>
            </form>
        @endif
        <template x-if="fields.length === 0">
            <div class="flex justify-center py-6">
                <em class="text-slate-400">Es wurden noch keine Felder hinzugefügt.</em>
            </div>
        </template>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('formBuilder', ($wire) => ({
                open: false,
                columns: $wire.entangle('columns'),
                fields: $wire.entangle('customFields'),

                saveSettings() {
                    const data = {
                        template: {
                            grid_columns: this.columns
                        }
                    }
                    $wire.saveSettings(data);
                },
            }))
        })
    </script>
</div>
