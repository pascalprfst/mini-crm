Alpine.data('addNewField', ($wire) => ({
    type: 'text',
    field_name: '',
    required: false,
    errors: [],
    types: ['text', 'date', 'url', 'email', 'longtext'],

    submitForm() {
        if (this.field_name.length === 0) {
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
            name: this.field_name,
            type: this.type,
            required: this.required
        });
    },
}))

Alpine.data('labelGenerator', ($wire) => ({
    edit: false,
    add: true,
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
    },

}))

Alpine.data('formBuilder', ($wire) => ({
    open: false,
    columns: $wire.entangle('columns'),
    error: '',

    changeColumns(columns) {
        if (![1, 2, 3].includes(this.columns)) {
            return;
        }

        this.columns = columns;
    },

    saveSettings() {
        if (![1, 2, 3].includes(this.columns)) {
            this.error = "Diese Spaltenanzahl ist nicht erlaubt."
            return;
        }

        const data = {
            template: {
                grid_columns: this.columns
            }
        }
        $wire.saveSettings(data);
    },
}))

