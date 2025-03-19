<div x-data="addLabelGroup($wire)">
    <h4 class="font-medium text-slate-800 text-base mb-2">Gruppe erstellen</h4>

    <form @submit.prevent="submitGroup">
        <x-input label="Gruppenname" id="groupname" name="groupname" x-model="groupname" @input="validate"
                 required/>

        <div class="mt-1.5">
            <x-select label="Objekt auswählen" name="model" id="model" x-model="model">
                <option disabled selected value="">Objekt auswählen</option>
                <option value="alle">Alle</option>
                <option value="customer">Kunden</option>
                <option value="contact">Kontakte</option>
            </x-select>
        </div>

        <div class="mt-4">
            <h5 class="text-slate-800 text-base mb-2">Optionen</h5>

            <template x-for="(option, index) in options" :key="index">
                <div class="mb-2 flex items-center">
                    <div class="w-full">
                        <x-input x-bind:placeholder="'Option ' + (index +1)" @input="validate"
                                 x-model="options[index].value"/>
                    </div>
                    <i @click="removeOption(index) "
                       class="fa-solid fa-circle-xmark text-lg text-red-600 hover:text-red-500 ml-2 cursor-pointer"></i>
                </div>
            </template>

            <x-sub-button @click="addOption">
                <i class="fa-solid fa-plus text-slate-800 font-semibold"></i>
                <span>Option hinzufügen</span>
            </x-sub-button>

            <div class="mt-4">
                <x-primary-button x-bind:disabled="valid === false" class="w-full flex justify-center">
                    Gruppe
                    speichern
                </x-primary-button>
            </div>
        </div>
    </form>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('addLabelGroup', ($wire) => ({
                valid: false,
                options: [],
                errors: [],
                groupname: '',
                model: '',

                init() {
                    this.options.push({
                        value: '',
                    })
                },

                addOption() {
                    this.options.push({
                        value: '',
                    })
                    this.validate();
                },

                removeOption(index) {
                    this.options.splice(index, 1);
                    this.validate();
                },

                submitGroup() {
                    if (!this.valid) {
                        return;
                    }

                    $wire.saveLabelGroup({
                        name: this.groupname,
                        modelType: this.model,
                        options: this.options
                    });
                },

                validate() {
                    if (this.groupname.trim() === '' || this.model.trim() === '') {
                        this.valid = false;
                        return;
                    }

                    if (this.options.length === 0 || this.options.some(option => option.value.trim() === '')) {
                        this.valid = false;
                        return;
                    }

                    this.valid = true;
                }
            }));
        });
    </script>

</div>
