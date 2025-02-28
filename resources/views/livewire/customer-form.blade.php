<div>
    @include('models.add-field')
    @include('models.edit-field')

    <div x-data="customerForm" x-cloak>
        <div class="pb-2 flex justify-between mb-2">
            <h2 x-show="!edit" class="font-bold text-slate-800">Kunden anlegen</h2>
            <h2 x-show="edit" class="font-bold text-slate-800">Kundenformular bearbeiten</h2>
            <div>
                <i x-show="!edit" @click="edit = true"
                   class="fa-solid fa-pencil text-lg text-slate-800 cursor-pointer"></i>
                <i x-show="edit" @click="edit = false"
                   class="fa-solid fa-eye text-lg text-slate-800 cursor-pointer"></i>
            </div>
        </div>

        <form x-show="edit" wire:submit="submitCustomer" class="space-y-4">
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

                    <div x-show="edit" @click="$dispatch('open-modal', {name: 'addCustomField'})"
                         class="text-sm text-slate-500 font-medium items-center flex justify-center cursor-pointer py-1.5 hover:text-slate-700">
                        <i class="fa-solid fa-plus text-lg font-medium mr-1.5"></i>
                        Neues Feld hinzufügen
                    </div>
                </div>


                <div class="ml-auto">
                    <x-primary-button>Formular speichern</x-primary-button>
                </div>
            </div>

            <ul x-sort x-bind:class="'grid grid-cols-' + columns + ' gap-4'">
                <template x-for="field in fields">
                    <li>
                        <div x-sort:item
                             class="cursor-grab bg-gray-100 p-1.5 rounded-md border-2 border-dotted border-gray-300 relative">
                            <div class="absolute right-2.5 top-2 flex items-center gap-x-2">
                                <i @click="$dispatch('open-modal', {name: 'editCustomField',  data: '12345' })"
                                   class="fa-solid fa-pencil text-slate-800 cursor-pointer"></i>
                                <i @click="deactivateField(field.id)"
                                   class="fa-solid fa-ban text-red-500 cursor-pointer"></i>
                            </div>
                            <div>
                                <label x-text="field.name" x-bind:for="field.slug"
                                       class="text-sm text-gray-500"></label><br>
                                <input disabled x-bind:name="field.slug" x-bind:id="field.slug"
                                       class="w-full border-gray-300 rounded-md"/>
                            </div>
                        </div>
                    </li>
                </template>
            </ul>
        </form>

        <form>
            <ul x-sort x-bind:class="'grid grid-cols-' + columns + ' gap-4'">
                @foreach($customFields as $index => $field)
                    <div x-show="!edit">
                        <li wire:key="{{$field['id']}}">
                            <label for="{{$field['slug']}}" class="text-sm text-gray-500">{{$field['name']}}</label><br>
                            <input wire:model="customFields.{{$index}}.value" name="{{$field['slug']}}"
                                   id="{{$field['slug']}}" class="w-full border-gray-300 rounded-md"/>
                        </li>
                    </div>
                @endforeach
            </ul>

            <div x-show="!edit" class="mt-6">
                <x-primary-button>Speichern</x-primary-button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('customerForm', () => ({
                open: false,
                edit: false,
                columns: 3,
                fields: @js($customFields),

                deactivateField(id) {
                    this.fields.forEach(field => {
                        console.log(field.name)
                    })
                },

                saveSettings() {

                }

            }))
        })
    </script>
</div>
