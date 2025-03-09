<div x-data="importFunction($wire)">
    <div class="pb-2 flex justify-between mb-2">
        <h2 class="font-bold text-slate-800">Import</h2>
    </div>

    <p class="text-slate-600 w-full p-2.5 border border-slate-300 rounded-md font-light mb-6">
        <i class="fa-solid fa-circle-info text-slate-600"></i>
        Nachdem du deine Datei hochgeladen hast, kannst du die Zieldatenbank auswählen und die Zuweisung
        der Felder vornehmen. Wenn nach der Zuweisung keine Fehler ausgegeben werden, klicke auf Import um deine
        Daten zu importieren. Nur <span class="font-black">.csv</span> und <span class="font-black">.xlsx</span> sind
        valide Dateitypen.
    </p>

    <label for="upload" class="w-full p-3 bg-slate-100 rounded-md flex gap-x-3 cursor-pointer">
        <div class="w-full min-h-20 border-2 border-dotted border-slate-300 rounded-md relative">
            <em class="text-slate-400 absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">Datei hier
                ablegen</em>
        </div>
    </label>
    <input type="file" wire:model="file" class="hidden" id="upload"/>

    @if($file && $error === '')
        <div class="mt-6">
            <div class="mt-6 p-2 bg-green-200 border border-green-500 rounded-sm">
                <div class="text-green-500">
                    <i class="fa-solid fa-circle-check mr-1.5 relative top-px"></i>{{$file->getClientOriginalName()}}
                    erfolgreich hochgeladen.
                </div>
            </div>
        </div>

        <div class="w-1/2 mt-4">
            <label for="model" class="font-medium text-slate-600">In Welche Datenbank möchtest du deine Daten
                importieren?</label>
            <div>
                <select id="model" name="model" wire:model.live="model"
                        class="w-full border-slate-300 px-2 py-1.5 rounded-md cursor-pointer">
                    <option disabled selected value="">Objekt auswählen</option>
                    <option value="customer">Kunden</option>
                    <option value="contact">Kontakte</option>
                </select>
            </div>
        </div>

        <div wire:show="model" class="mt-4">
            <p class="text-slate-600 font-medium">Felder aus <b>{{$file->getClientOriginalName()}}</b></p>

            <ul x-sort class="flex gap-3 flex-nowrap mt-1">
                <template x-for="column in uploadColumns">
                    <li x-sort:item class="border border-slate-300 rounded-sm px-2.5 py-1 cursor-grab">
                        <div x-text="column">
                        </div>
                    </li>
                </template>
            </ul>
        </div>

        <div wire:show="model" class="mt-4">
            <p class="text-slate-600 font-medium">Verfügbare Felder</p>
        </div>
    @endif
    @if($error)
        <div class="mt-6 p-2 bg-red-200 border border-red-600 rounded-sm">
            <div class="text-red-600">
                <i class="fa-solid fa-triangle-exclamation mr-1.5 relative top-px"></i>{{$error}}
            </div>
        </div>
    @endif

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('importFunction', ($wire) => ({
                uploadColumns: [],

                getUploadColumns(data) {
                    this.uploadColumns = data;
                },
                
            }))

        })
    </script>
</div>

