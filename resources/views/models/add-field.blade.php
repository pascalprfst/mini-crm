<x-modal name="addCustomField" aside>
    <h2 class="text-slate-800 font-bold">Neues Feld hinzufügen</h2>

    @if($form)
        {!! $form !!}
    @endif

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
