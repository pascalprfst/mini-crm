Alpine.data('addNewField', ($wire) => ({
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
            return;
        }

        if (!this.types.includes(this.type)) {
            this.errors.push({
                error: 'Dieser Feldtyp existiert nicht.'
            })
            return;
        }

        $wire.addFormField({
            name: this.name,
            type: this.type,
            required: this.required
        });
    }
}))
