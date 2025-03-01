<div>
    <div class="pb-2 flex justify-between mb-2">
        <h2 class="font-bold text-slate-800">Export</h2>
    </div>

    <div class="w-1/2">
        <label for="model" class="text-sm text-slate-600">Objekte</label>
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
            <p class="text-slate-600 w-full p-2.5 border border-slate-300 rounded-md">
                <i class="fa-solid fa-circle-info text-slate-600"></i>
                Wähle zwischen CSV und Excel aus und entscheide ob du eine Kopfzeile mit
                exportieren möchtest. Ziehe die Felder, die du exportieren möchtest an die von dir
                gewünschte Position. Wenn du mit der Anordnung und den Einstellungen zufrieden bist, klicke auf Export
                und dir
                werden deine Daten als Download zur
                Verfügung gestellt.
            </p>
        </div>

        @if(count($fields) > 0)
            <ul x-sort class="flex gap-3 flex-wrap my-6">
                @foreach($fields as $field)
                    <li x-sort:item>
                        <div class=" border border-slate-300 rounded-sm px-2.5 py-px text-slate-800 cursor-pointer">
                            {{$field->name}}
                        </div>
                    </li>
                @endforeach
            </ul>

            <div class="w-full p-3 bg-slate-100 rounded-md flex gap-x-3">
                <div
                    class="w-full max-w-52 min-h-20 grid place-content-center border-2 border-dotted border-slate-300 rounded-md">
                    Position 1
                </div>
                <div
                    class="w-full max-w-52 min-h-20 grid place-content-center border-2 border-dotted border-slate-300 rounded-md">
                    Position 2
                </div>
                <div
                    class="w-full max-w-52 min-h-20 grid place-content-center border-2 border-dotted border-slate-300 rounded-md">
                    Position 3
                </div>
                <div
                    class="w-full max-w-52 min-h-20 grid place-content-center border-2 border-dotted border-slate-300 rounded-md">
                    Position 4
                </div>
            </div>

            <div class="mt-6">
                <x-primary-button>Exportieren</x-primary-button>
            </div>
        @else
            <div class="py-6 text-slate-400 flex justify-center">
                <em>Dein ausgewähltes Objekt besitzt aktuell noch keine Felder.</em>
            </div>
        @endif
    @endif
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('export', () => ({}))
    })
</script>
