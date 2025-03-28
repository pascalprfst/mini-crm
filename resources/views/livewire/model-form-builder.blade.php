<div x-data="formBuilder($wire)" x-cloak>

    <div x-data="addNewField($wire)">
        @include('models.add-field')
    </div>
    <div>
        @include('models.edit-field')
    </div>

    <div class="flex flex-col xl:flex-row gap-8">
        <x-section class="w-full max-h-max pb-8" heading="Formular & Objekt Builder">
            <div>
                <h4 class="font-medium text-slate-800 text-base mb-2">Formular</h4>

                <div class="w-1/2 mb-6">
                    <div>
                        <x-select label="Objekt" id="model" name="model" wire:model.live="model" @change="error = ''">
                            <option disabled selected value="">Objekt auswählen</option>
                            <option value="customer">Kunden</option>
                            <option value="contact">Kontakte</option>
                        </x-select>
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

                                <x-sub-button @click="$dispatch('open-modal', {name: 'addCustomField'})">
                                    <i class="fa-solid fa-plus text-slate-800 font-semibold"></i>
                                    Neues Feld hinzufügen
                                </x-sub-button>

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
                                                <span
                                                    class="text-xs text-white bg-amber-500 px-1.5 py-0.5 rounded-md">{{__('app-builder.required')}}</span>
                                                <i class="fa-solid fa-triangle-exclamation text-slate-800 font-bold"></i>
                                            @endif
                                            <i @click="$dispatch('open-modal', {name: 'editCustomField',  data: '12345' })"
                                               class="fa-solid fa-pencil text-slate-800 cursor-pointer"></i>
                                            @if(!$setting->locked)
                                                @if($setting->active)
                                                    <i wire:click="toggleFieldStatus({{$setting->id}})"
                                                       class="fa-solid fa-ban text-red-500 cursor-pointer"></i>
                                                @else
                                                    <i wire:click="toggleFieldStatus({{$setting->id}})"
                                                       class="fa-solid fa-check text-green-500 cursor-pointer"></i>
                                                @endif
                                            @endif
                                            @if($setting->locked)
                                                <i class="fa-solid fa-lock text-slate-800"></i>
                                            @endif
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

                        @if(count($labelGroups) > 0)
                            <div class="flex flex-wrap gap-2.5">
                                @foreach($labelGroups as $group)
                                    <div class="relative group">
                                        <div
                                            wire:click="toggleLabelGroup({{$group->id}})"
                                            class=" border border-slate-300 text-base rounded-md py-0.5 px-2.5 cursor-pointer">
                                            {{$group->name}}
                                        </div>
                                        <div
                                            class="hidden group-hover:flex text-sm px-2 py-0.5 left-0 -bottom-8 rounded-sm shadow-sm bg-yellow-200 absolute  flex-wrap justify-center gap-2 z-20 w-52">
                                            @foreach($group->values as $id => $value)
                                                <span>{{$value}}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="w-full py-4 flex justify-center">
                                <em class="text-base text-slate-400">Es wurden noch keine Gruppe angelegt.</em>
                            </div>
                        @endif
                    </form>
                @endif
            </div>
        </x-section>

        <x-section class="w-full xl:max-w-96 max-h-max" heading="Label Generator">
            <div x-data="{add: true, edit: false}">
                <div class="grid grid-cols-2 gap-x-4 mb-3">
                    <x-sub-button @click="add = true; edit = false;">
                        <i class="fa-solid fa-plus text-slate-800 font-semibold"></i>
                        Gruppe erstellen
                    </x-sub-button>
                    <x-sub-button @click="edit = true; add = false;">
                        <i class="fa-solid fa-edit text-slate-800 font-semibold"></i>
                        Gruppe bearbeiten
                    </x-sub-button>
                </div>

                <div x-show="add">
                    <x-forms.add-label-group/>
                </div>

                <div x-show="edit">
                    <x-forms.edit-label-group :allLabelGroups="$allLabelGroups"
                                              :selectedGroup="$selectedGroup"/>
                </div>


            </div>
        </x-section>
    </div>
</div>
