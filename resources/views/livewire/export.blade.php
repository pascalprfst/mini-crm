<x-section heading="Export">
    <div x-data="exportSystem($wire)" x-cloak>
        <div class="w-1/2">
            <label for="model" class="text-sm font-medium text-neutral-600">Objekt</label>
            <div>
                <select id="model" name="model" wire:model.live="model"
                        class="w-full border-neutral-300 px-2 py-1.5 rounded-md cursor-pointer">
                    <option disabled selected value="">Objekt auswählen</option>
                    <option value="customer">Kunden</option>
                    <option value="contact">Kontakte</option>
                </select>
            </div>
        </div>

        @if($model !== '')
            <div class="mt-6">
                <p class="text-neutral-600 w-full p-2.5 border border-neutral-300 rounded-md font-light">
                    <i class="fa-solid fa-circle-info text-neutral-600"></i>
                    Wähle zwischen CSV und Excel aus und entscheide ob du eine Kopfzeile mit
                    exportieren möchtest. Ziehe die Felder, die du exportieren möchtest an die von dir
                    gewünschte Position. Wenn du mit der Anordnung und den Einstellungen zufrieden bist, klicke auf
                    Export
                    und dir werden deine Daten als Download zur Verfügung gestellt.
                </p>
            </div>

            @if(count($fields) > 0)
                <form id="exportForm" @submit.prevent="requestExport" class="flex gap-x-8 mt-3">
                    <div class="w-1/3 ">
                        <label for="filename" class="text-sm font-medium text-neutral-600">Dateiname<span
                                class="text-red-500">*</span></label>
                        <input x-model="filename" type="text" id="filename" name="filename"
                               :class="!validateFilename(filename) ? 'focus:ring-red-400 focus:border-red-400' : ''"
                               class="w-full border-neutral-300 px-2 py-1.5 rounded-md cursor-pointer text-neutral-500"/>
                    </div>

                    <div>
                        <span class="text-neutral-600 text-sm font-medium">Format</span>
                        <div class="flex gap-x-2.5">
                            <label for="csv" class="block text-sm text-neutral-600">
                                <input x-model="type" id="csv" name="csv" value="csv" type="radio"/>
                                <span class="relative top-0.5">CSV</span>
                            </label>
                            <label for="excel" class="block text-sm text-neutral-600">
                                <input x-model="type" id="excel" name="excel" value="excel" type="radio"/>
                                <span class="relative top-0.5">Excel</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <span class="text-neutral-600 text-sm font-medium">Kopfzeile</span>
                        <label for="csv" class="block text-sm text-neutral-600">
                            <input x-model="withHeader" id="csv" name="type" value="csv" type="checkbox"/>
                            <span class="relative top-px">Mit Kopfzeile exportieren</span>
                        </label>
                    </div>
                </form>

                <div class="my-6">
                    <span class="text-neutral-600 text-sm font-medium">Verfügbare Felder</span>
                    <ul x-sort x-sort:group="fields" class="flex gap-3 flex-wrap mt-1">
                        @foreach($fields as $index => $field)
                            <li x-sort:item wire:key="{{$index}}">
                                <div
                                    class="border border-neutral-300 rounded-sm px-2.5 text-neutral-800 cursor-pointer whitespace-nowrap">
                                    {{ __('form-fields.' . $field['field_name']) != 'form-fields.' . $field['field_name'] ? __('form-fields.' . $field['field_name']) : $field['field_name'] }}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="w-full p-3 bg-neutral-100 rounded-md flex gap-x-3">
                    <div class="w-full min-h-20 border-2 border-dotted border-neutral-300 rounded-md relative">
                        <ul x-sort x-sort:group="fields" @drop="$wire.selectFieldForExport(2);" class="flex gap-3">

                        </ul>
                        <em class="text-neutral-400 absolute left-1/2 top-1/2 -tranneutral-x-1/2 -tranneutral-y-1/2">Felder
                            heir
                            ablegen</em>
                    </div>
                </div>

                <div class="mt-6">
                    <x-primary-button x-bind:disabled="filename.length === 0 || !validateFilename(filename)"
                                      form="exportForm">Exportieren
                    </x-primary-button>
                    <span x-show="error" x-text="error" class="ml-2 mt-2 text-red-500 text-sm"></span>
                    @if($error)
                        <span class="ml-2 mt-2 text-red-500 text-sm">
                            {{$error}}
                        </span>
                    @endif
                </div>
            @else
                <div class="py-6 text-neutral-400 flex justify-center">
                    <em>Dein ausgewähltes Objekt besitzt aktuell noch keine Felder.</em>
                </div>
            @endif
        @endif
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('exportSystem', ($wire) => ({
                    type: 'csv',
                    withHeader: false,
                    filename: '',
                    sorting: [],
                    error: '',

                    requestExport() {
                        if (!this.validateFilename(this.filename)) {
                            this.error = 'Der Dateiname ist nicht erlaubt.'
                            return;
                        }

                        if (this.type !== 'csv' && this.type !== 'excel') {
                            this.error = 'Es wurde kein valider Dateityp ausgewählt.';
                            return
                        }

                        this.error = '';

                        const data = {
                            type: this.type,
                            header: this.withHeader,
                            filename: this.filename,
                            soring: this.sorting,
                        };

                        $wire.export(data);
                    },

                    validateFilename(name) {
                        const forbiddenChars = /[\/:*?"<>|]/;
                        return typeof name === 'string' && name.length > 0 && !forbiddenChars.test(name);
                    }
                }))
            })
        </script>
    </div>
</x-section>


