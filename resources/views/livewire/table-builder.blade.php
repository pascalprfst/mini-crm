<div>
    <div class="pb-2 flex justify-between mb-2">
        <h2 class="font-bold text-slate-800">Tabellen Builder</h2>
    </div>

    <div class="w-1/2 mb-6">
        <label for="model" class="text-sm font-medium text-slate-600">Objekt</label>
        <div>
            <select id="model" name="model" wire:model.live="model" @change="error = ''"
                    class="w-full border-slate-300 px-2 py-1.5 rounded-md cursor-pointer">
                <option disabled selected value="">Objekt auswählen</option>
                <option value="CUSTOMER">Kunden</option>
                <option value="CONTACTS">Kontakte</option>
            </select>
        </div>
    </div>
</div>
