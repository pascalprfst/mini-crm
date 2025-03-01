<div x-data="exportSystem" x-cloak>
    <div class="pb-2 flex justify-between mb-2">
        <h2 class="font-bold text-slate-800">Export</h2>
    </div>

    <div class="w-1/2">
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

    @if($model !== '')
        <div class="mt-6">
            <p class="text-slate-600 w-full p-2.5 border border-slate-300 rounded-md font-light">
                <i class="fa-solid fa-circle-info text-slate-600"></i>
                Wähle zwischen CSV und Excel aus und entscheide ob du eine Kopfzeile mit
                exportieren möchtest. Ziehe die Felder, die du exportieren möchtest an die von dir
                gewünschte Position. Wenn du mit der Anordnung und den Einstellungen zufrieden bist, klicke auf Export
                und dir werden deine Daten als Download zur Verfügung gestellt.
            </p>
        </div>

        @if(count($fields) > 0)
            <form id="exportForm" @submit.prevent="requestExport" class="flex gap-x-8 mt-3">
                <div class="w-1/3 ">
                    <label for="filename" class="text-sm font-medium text-slate-600">Dateiname</label>
                    <input x-model="filename" type="text" id="filename" name="filename"
                           class="w-full border-slate-300 px-2 py-1.5 rounded-md cursor-pointer text-slate-500"/>
                    <span x-show="nameError" x-text="nameError" class="mt-2 text-red-500 text-sm"></span>
                </div>

                <div>
                    <span class="text-slate-600 text-sm font-medium">Format</span>
                    <div class="flex gap-x-2.5">
                        <label for="csv" class="block text-sm text-slate-600">
                            <input x-model="type" id="csv" name="type" value="csv" type="radio"/>
                            <span class="relative top-0.5">CSV</span>
                        </label>
                        <label for="excel" class="block text-sm text-slate-600">
                            <input x-model="type" id="excel" name="type" value="excel" type="radio"/>
                            <span class="relative top-0.5">Excel</span>
                        </label>
                    </div>
                </div>

                <div>
                    <span class="text-slate-600 text-sm font-medium">Kopfzeile</span>
                    <label for="csv" class="block text-sm text-slate-600">
                        <input x-model="withHeader" id="csv" name="type" value="csv" type="checkbox"/>
                        <span class="relative top-px">Mit Kopfzeile exportieren</span>
                    </label>
                </div>
            </form>

            <div class="my-6">
                <span class="text-slate-600 text-sm font-medium">Verfügbare Felder</span>
                <ul x-sort x-sort:group="fields" class="flex gap-3 flex-wrap mt-1">
                    @foreach($fields as $field)
                        <li x-sort:item>
                            <div
                                class="border border-slate-300 rounded-sm px-2.5 text-slate-800 cursor-pointer whitespace-nowrap">
                                {{$field->name}}
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="w-full p-3 bg-slate-100 rounded-md flex gap-x-3">
                <ul x-sort x-sort:group="fields" class="flex gap-3">

                </ul>
                <div
                    class="w-full min-h-20 grid place-content-center border-2 border-dotted border-slate-300 rounded-md">
                    <em class="text-slate-400">Felder hier ablegen</em>
                </div>
            </div>

            <div class="mt-6">
                <x-primary-button form="exportForm">Exportieren</x-primary-button>
            </div>
        @else
            <div class="py-6 text-slate-400 flex justify-center">
                <em>Dein ausgewähltes Objekt besitzt aktuell noch keine Felder.</em>
            </div>
        @endif
    @endif
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('exportSystem', () => ({
                type: 'csv',
                withHeader: false,
                filename: '',
                nameError: '',
                error: '',

                requestExport() {
                    if (!this.validateFilename(this.filename)) {
                        this.nameError = 'Der Dateiname ist nicht erlaubt.'
                        return;
                    }

                    if (this.type !== 'csv' || this.type !== 'excel') {
                        this.error = 'Es wurde kein valider Dateityp ausgewählt.';
                        return
                    }

                    // Globaler Error ausgeben neben Button

                    this.error = '';
                    this.nameError = '';

                    const data = {
                        type: this.type,
                        header: this.withHeader,
                        filename: this.filename
                    };

                    this.$wire.export(data);
                },

                validateFilename(name) {
                    const forbiddenChars = /[\/:*?"<>|]/;
                    return typeof name === 'string' && name.length > 0 && !forbiddenChars.test(name);
                }
            }))
        })
    </script>
</div>

