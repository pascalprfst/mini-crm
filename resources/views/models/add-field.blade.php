<x-modal name="addCustomField" aside>
    <h2 class="text-slate-800 font-bold">Neues Feld hinzufügen</h2>

    <form @submit.prevent="submitForm" x-data="addNewField" class="mt-4">

        <label for="fieldname" class="text-sm text-slate-600 relative">
            Feldname<span class="text-red-500">*</span>
        </label>
        <input x-model="name" type="text" required id="fieldname" name="fieldname"
               class="w-full rounded-md border-slate-300 py-1.5"/>

        <div class="mt-4 flex items-center">
            <div @click="required = !required"
                 class="border border-slate-300 rounded-sm w-4 h-4 cursor-pointer mr-1 grid place-content-center">
                <i x-show="required" class="fa-solid fa-check text-green-500"></i>
            </div>
            <label @click="required = !required" for="required" class="text-sm text-slate-600 cursor-pointer">
                Pflichtfeld
            </label>
            <input x-model="required" class="hidden" type="checkbox" id="required"
                   name="required"/>
        </div>

        <div class="mt-4">
            <h3 class="text-slate-800 font-medium">Feldtyp</h3>
            <div class="flex flex-wrap gap-2.5 mt-4">
                @foreach($fieldTypes as $type)
                    <div>
                        <label for="type-{{$type['type']}}" @click="type = '{{$type['type']}}'"
                               x-bind:class="type === '{{$type['type']}}' ? 'border border-green-500 text-green-500' : 'border border-slate-300' "
                               class="text-sm bg-slate-50 px-1.5 rounded-sm cursor-pointer">
                            {{$type['name']}}
                        </label>
                        <input type="radio" id="type-{{$type['type']}}" name="type" value="{{$type['type']}}"
                               class="hidden"
                               x-model="type"/>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-6">
            <x-primary-button>
                Formularfeld speichern
            </x-primary-button>
        </div>
    </form>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('addNewField', () => ({
                type: 'text',
                name: '',
                required: false,
                errors: [],
                types: ['text', 'date', 'url', 'email', 'longtext'],

                submitForm() {
                    if (this.name.length === 0) {
                        this.errors.push({
                            error: 'Das Feld braucht einen Namen.'
                        })
                        console.log(this.errors);
                        return;
                    }

                    if (!this.types.includes(this.type)) {
                        this.errors.push({
                            error: 'Dieser Feldtyp existiert nicht.'
                        })
                        return;
                    }

                    this.$wire.addFormField({
                        name: this.name,
                        type: this.type,
                        required: this.required
                    });
                }
            }))
        })
    </script>
</x-modal>
