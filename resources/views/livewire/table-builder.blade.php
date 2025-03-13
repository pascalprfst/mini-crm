<div x-data="tableBuilder($wire)">
    <x-section heading="Tabellen Builder">
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

        <p class="text-slate-600 w-full p-2.5 border border-slate-300 rounded-md font-light mb-6">
            <i class="fa-solid fa-circle-info text-slate-600"></i>
            Ziehe mit dem <i class="fa-solid fa-compress text-main "></i> Icon die Spalten an die gewünschte Position.
            Über
            <span class="border border-slate-300 rounded-sm text-sm px-2.5">S</span> <span
                class="border border-slate-300 rounded-sm text-sm px-2.5">M</span> und
            <span class="border border-slate-300 rounded-sm text-sm px-2.5">L</span> kannst du die
            Spaltenbreite definieren. Mit einem Klick auf <i class="fa-solid fa-eye text-blue-600"></i> kannst du die
            Spalte
            für diese
            Tabelle ausblenden.
        </p>

        <div>
            <h3 class="font-medum text-slate-600 my-4">Anordnung Spalten</h3>
            <ul x-sort class="flex gap-x-2.5 -mx-6 px-6 overflow-x-auto">
                <template x-for="field in fields">
                    <li x-sort:item
                        class="border border-slate-300 text-sm text-main px-2.5 py-1.5 rounded-sm bg-slate-100">
                        <div class="flex justify-between">
                            <div class="whitespace-nowrap">
                                <i class="fa-solid fa-eye text-blue-600 cursor-pointer mr-2.5"></i>
                                <span @click="columnSize = 'S'"
                                      :class="columnSize === 'S' ? 'border-green-500 text-green-500' : 'border-slate-300'"
                                      class="border font-bold rounded-sm px-2.5 cursor-pointer">S</span>
                                <span @click="columnSize = 'M'"
                                      :class="columnSize === 'M' ? 'border-green-500 text-green-500' : 'border-slate-300'"
                                      class="border rounded-sm font-bold px-2.5 cursor-pointer">M</span>
                                <span @click="columnSize = 'L'"
                                      :class="columnSize === 'L' ? 'border-green-500 text-green-500' : 'border-slate-300'"
                                      class="border rounded-sm px-2.5 font-bold cursor-pointer">L</span>
                            </div>
                            <div class="ml-4">
                                <i x-sort:handle class="fa-solid fa-compress text-main text-lg cursor-grab"></i>
                            </div>
                        </div>
                        <div x-text="field.name" class="whitespace-nowrap mt-2 font-medium text-slate-800"></div>
                    </li>
                </template>
            </ul>
        </div>

        <h3 class="font-medum text-slate-600 mt-6 mb-4">Vorschau</h3>
        <div class="relative overflow-x-auto -mx-6 px-6 ">
            <table class="border border-slate-300 rounded-md w-full">
                <tr class="text-left bg-blue-600 text-white font-medium border-b border-slate-300">
                    <template x-for="field in fields">
                        <th :class="[columnSize === 'S' ? 'min-w-40' : '' , columnSize === 'M' ?  'min-w-52' : '', columnSize === 'L' ? 'min-w-72' : '' ]"
                            class="px-2 py-1 whitespace-nowrap" x-text="field.name"></th>
                    </template>
                </tr>
                @foreach($customers as $customer)
                    <tr>
                    </tr>
                @endforeach
            </table>
            <div style="background: linear-gradient(to bottom, transparent 0%, transparent 1%, white 100%);"
                 class="absolute w-full bottom-0 h-32">
            </div>
        </div>
        <div class="w-full h-12 bg-white"></div>

        <div class="mt-2">
            <x-primary-button>Tabelle speichern</x-primary-button>
        </div>
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('tableBuilder', ($wire) => ({
                    fields: $wire.entangle('customFields'),
                    columnSize: 'S',
                }))
            })
        </script>
    </x-section>
</div>
