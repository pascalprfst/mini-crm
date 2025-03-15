<div x-data="formBuilder($wire)" x-cloak>

    <div x-data="addNewField($wire)">
        @include('models.add-field')
    </div>
    <div>
        @include('models.edit-field')
    </div>

    <div class="flex flex-col xl:flex-row gap-8">

        <x-section class="w-full max-h-max" heading="Formular & Objekt Builder">
            <div>
                <div class="w-1/2 mb-6">
                    <label for="model" class="text-sm font-medium text-slate-600">Objekt</label>
                    <div>
                        <select id="model" name="model" wire:model.live="model" @change="error = ''"
                                class="w-full text-base border-slate-300 px-2 py-1.5 rounded-sm cursor-pointer">
                            <option disabled selected value="">Objekt auswählen</option>
                            <option value="customer">Kunden</option>
                            <option value="contact">Kontakte</option>
                        </select>
                    </div>
                </div>

                @if($model)
                    <form @submit.prevent="saveSettings()" class="space-y-4">
                        <div class="flex items-end">
                            <div class="flex items-end gap-x-4">
                                <div>
                                    <span class="text-slate-800 text-sm">Anordnung</span>

                                    <div class="bg-slate-100 flex border border-slate-300 max-w-fit rounded-sm">
                                        <div @click="changeColumns(1)"
                                             class="grid place-content-center px-4 py-0.5 font-medium cursor-pointer hover:bg-slate-200 relative ">
                                            |
                                        </div>
                                        <div @click="changeColumns(2)"
                                             class="grid place-content-center px-4 py-0.5 font-medium border-x border-slate-300 cursor-pointer hover:bg-slate-200 relative ">
                                            ||
                                        </div>
                                        <div @click="changeColumns(3)"
                                             class="grid place-content-center px-4 py-0.5 font-medium cursor-pointer hover:bg-slate-200 relative ">
                                            |||
                                        </div>
                                    </div>
                                </div>

                                <div @click="$dispatch('open-modal', {name: 'addCustomField'})"
                                     class="text-sm text-slate-500 font-medium items-center flex justify-center cursor-pointer py-1.5 hover:text-slate-700">
                                    <i class="fa-solid fa-plus text-lg font-medium mr-1.5"></i>
                                    Neues Feld hinzufügen
                                </div>

                                <template x-if="error">
                                    <div class="text-red-500 text-sm py-1.5" x-text="error"></div>
                                </template>

                            </div>
                            <div class="ml-auto">
                                <x-primary-button class="text-sm">Vorlage speichern</x-primary-button>
                            </div>
                        </div>

                        <ul x-sort :style="'grid-template-columns: repeat(' + columns + ', 1fr)'"
                            class="grid gap-4 mb-2">
                            @foreach($fieldSettings as $setting)
                                <li>
                                    <div @if($setting->active)
                                             x-sort:item
                                         @endif
                                         class="{{!$setting->active ? 'bg-red-100' : 'bg-slate-100 cursor-grab'}}  p-1.5 rounded-md border-2 border-dotted border-slate-300 relative">
                                        <div class="absolute right-2.5 top-2 flex items-center gap-x-2">
                                            @if($setting->required)
                                                <i class="fa-solid fa-triangle-exclamation text-slate-800 font-bold"></i>
                                            @endif
                                            <i @click="$dispatch('open-modal', {name: 'editCustomField',  data: '12345' })"
                                               class="fa-solid fa-pencil text-slate-800 cursor-pointer"></i>
                                            @if($setting->active)
                                                <i wire:click="toggleFieldStatus({{$setting->id}})"
                                                   class="fa-solid fa-ban text-red-500 cursor-pointer"></i>
                                            @else
                                                <i wire:click="toggleFieldStatus({{$setting->id}})"
                                                   class="fa-solid fa-check text-green-500 cursor-pointer"></i>
                                            @endif
                                            <i class="fa-solid fa-trash-can text-red-500 cursor-pointer"></i>
                                        </div>
                                        <div>
                                            <div class="text-sm text-slate-500">
                                                <span class="font-bold">Name:</span> {{$setting->field_name}}
                                            </div>
                                        </div>
                                        <div class="text-sm text-slate-500">
                                            <span class="font-bold">Feldtyp:</span> {{$setting->field_type}}
                                        </div>
                                        <div class="text-sm text-slate-500">
                                            <span class="font-bold">Status:</span>
                                            <span>{{$setting->active ? 'Aktiv' : 'Inaktiv'}}</span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <hr>
                        <h4 class="font-medium text-slate-800 text-base mb-2">Label Gruppen</h4>
                    </form>
                @endif
            </div>
        </x-section>

        <x-section x-data="labelGenerator($wire)" class="w-full xl:max-w-96 max-h-max" heading="Label Generator">

            <div class="grid grid-cols-2 gap-x-4 mb-3">
                <div
                    @click="add = true; edit = false;"
                    class="border border-slate-300 bg-slate-100 rouned-sm text-sm text-slate-800 text-center py-1.5 hover:bg-slate-200 cursor-pointer">
                    <i class="fa-solid fa-plus text-slate-800 font-semibold"></i>
                    Gruppe erstellen
                </div>
                <div
                    @click="edit = true; add = false;"
                    class="border border-slate-300 bg-slate-100 rouned-sm text-sm text-slate-800 text-center py-1.5 hover:bg-slate-200 cursor-pointer">
                    <i class="fa-solid fa-edit text-slate-800 font-semibold"></i>
                    Gruppe bearbeiten
                </div>
            </div>

            <div x-show="edit">
                <h4 class="font-medium text-slate-800 text-base mb-2">Gruppe bearbeiten</h4>
                <x-select label="Gruppe auswählen" name="group" id="group">
                    <option disabled selected value="">Gruppe auswählen</option>
                </x-select>
            </div>

            <div x-show="add">
                <h4 class="font-medium text-slate-700 text-base mb-2">Gruppe erstellen</h4>

                <form @submit.prevent="submitGroup">
                    <x-input label="Gruppenname" id="groupname" name="groupname" x-model="groupname" required/>

                    <div class="mt-1.5">
                        <x-select label="Objekt auswählen" name="model" id="model">
                            <option disabled selected value="">Objekt auswählen</option>
                            <option value="alle">Alle</option>
                            <option value="customer">Kunden</option>
                            <option value="contact">Kontakte</option>
                        </x-select>
                    </div>

                    <div class="mt-4">
                        <h5 class="text-slate-700 text-base mb-2">Optionen</h5>

                        <template x-for="(option, index) in options" :key="index">
                            <div class="mb-2 flex items-center">
                                <div class="w-full">
                                    <x-input x-bind:placeholder="'Option ' + (index +1)"
                                             x-model="options[index].value"/>
                                </div>
                                <i @click="removeOption(index) "
                                   class="fa-solid fa-circle-xmark text-lg text-red-600 hover:text-red-500 ml-2 cursor-pointer"></i>
                            </div>
                        </template>

                        <div
                            @click="addOption"
                            class="border border-slate-300 bg-slate-100 rouned-sm text-sm mt-4 text-slate-800 text-center py-1.5 hover:bg-slate-200 cursor-pointer">
                            <i class="fa-solid fa-plus text-slate-800 font-semibold"></i>
                            <span class="relative -top-px">Option hinzufügen</span>
                        </div>

                        <div class="mt-4">
                            <x-primary-button class="w-full flex justify-center">Gruppe speichern
                            </x-primary-button>
                        </div>
                    </div>
                </form>
            </div>
        </x-section>
    </div>
</div>
