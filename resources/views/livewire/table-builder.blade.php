<div x-data="tableBuilder($wire)">
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

    <p class="text-slate-600 w-full p-2.5 border border-slate-300 rounded-md font-light mb-6">
        <i class="fa-solid fa-circle-info text-slate-600"></i>
        Ziehe mit dem <i class="fa-solid fa-compress text-main "></i> Icon die Spalten an die gewünschte Position. Über
        <span class="border border-slate-300 rounded-sm text-sm px-2.5">S</span> <span
            class="border border-slate-300 rounded-sm text-sm px-2.5">M</span> und
        <span class="border border-slate-300 rounded-sm text-sm px-2.5">L</span> kannst du die
        Spaltenbreite definieren. Mit einem Klick auf <i class="fa-solid fa-eye text-blue-600"></i> kannst du die Spalte
        für diese
        Tabelle ausblenden.
    </p>

    <div>
        <h3 class="font-medum text-slate-600 my-4">Anordnung Spalten</h3>
        <ul x-sort class="flex gap-x-2.5 -mx-6 px-6 overflow-x-auto">
            <template x-for="field in fields">
                <li x-sort:item class="border border-slate-300 text-sm text-main px-2.5 py-1.5 rounded-sm bg-slate-100">
                    <div class="flex justify-between">
                        <div class="whitespace-nowrap">
                            <i class="fa-solid fa-eye text-blue-600 cursor-pointer mr-2.5"></i>
                            <span
                                class="border border-green-300 text-green-500 font-bold rounded-sm px-2.5 cursor-pointer">S</span>
                            <span class="border border-slate-300 rounded-sm font-bold px-2.5 cursor-pointer">M</span>
                            <span class="border border-slate-300 rounded-sm px-2.5 font-bold cursor-pointer">L</span>
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
    <div class="relative">
        <table class="border border-slate-300 rounded-md w-full">
            <tr class="text-left bg-blue-600 text-white font-medium border-b border-slate-300">
                <th class="px-2 py-1">Name</th>
                <th class="px-2 py-1">Straße</th>
                <th class="px-2 py-1">Postleitzahl</th>
                <th class="px-2 py-1">Stadt</th>
                <th class="px-2 py-1">E-Mail</th>
                <th class="px-2 py-1">Telefon</th>
            </tr>
            <tr>
                <td class="px-2 py-1">Alfreds Futterkiste</td>
                <td class="px-2 py-1">Maria Anders</td>
                <td class="px-2 py-1">10115</td>
                <td class="px-2 py-1">Berlin</td>
                <td class="px-2 py-1">maria.anders@example.com</td>
                <td class="px-2 py-1">+49 30 123456</td>
            </tr>
            <tr class="bg-slate-100">
                <td class="px-2 py-1">Centro comercial Moctezuma</td>
                <td class="px-2 py-1">Francisco Chang</td>
                <td class="px-2 py-1">06000</td>
                <td class="px-2 py-1">Mexico City</td>
                <td class="px-2 py-1">francisco.chang@example.com</td>
                <td class="px-2 py-1">+52 55 987654</td>
            </tr>
            <tr>
                <td class="px-2 py-1">Berglunds snabbköp</td>
                <td class="px-2 py-1">Christina Berglund</td>
                <td class="px-2 py-1">41104</td>
                <td class="px-2 py-1">Göteborg</td>
                <td class="px-2 py-1">christina.berglund@example.com</td>
                <td class="px-2 py-1">+46 31 765432</td>
            </tr>
            <tr class="bg-slate-100">
                <td class="px-2 py-1">Island Trading</td>
                <td class="px-2 py-1">Helen Bennett</td>
                <td class="px-2 py-1">SW1A 1AA</td>
                <td class="px-2 py-1">London</td>
                <td class="px-2 py-1">helen.bennett@example.com</td>
                <td class="px-2 py-1">+44 20 123456</td>
            </tr>
            <tr>
                <td class="px-2 py-1">Laughing Bacchus Winecellars</td>
                <td class="px-2 py-1">Yoshi Tannamuri</td>
                <td class="px-2 py-1">94016</td>
                <td class="px-2 py-1">San Francisco</td>
                <td class="px-2 py-1">yoshi.tannamuri@example.com</td>
                <td class="px-2 py-1">+1 415 789123</td>
            </tr>
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
            }))
        })
    </script>
</div>
