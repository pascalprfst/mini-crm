<?php

namespace App\Livewire;

use App\Classes\FieldTypes;
use App\Models\FormTemplate;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;
use Livewire\Component;

class ModelFormBuilder extends Component
{
    public string $model = '';

    public array $customFields = [];
    public array $fieldTypes = [];
    public string $error = '';
    public int $columns = 2;
    public string $form = '';

    public array $fields = [];
    public Collection $fieldSettings;

    public function mount(): void
    {
        $this->fieldTypes = FieldTypes::getFieldTypes();
    }

    public function updatedModel(): void
    {
        $template = FormTemplate::where('model', $this->model)->first();

        if ($template) {
            $this->columns = $template->grid_columns ?? 2;
        }

        $this->fields = $this->getFields();

        $this->fieldSettings = $this->getFieldSettings();

        $this->form = view('components.forms.basic-form', [
            'fieldTypes' => $this->fieldTypes,
        ]);

    }

    public function selectForm(string $type): void
    {
        if ($type === 'select') {
            $this->form = view('components.forms.select-form', [
                'fieldTypes' => $this->fieldTypes,
            ]);
        } else {
            $this->form = view('components.forms.basic-form', [
                'fieldTypes' => $this->fieldTypes,
            ]);
        }
    }

    public function addFormField(array $data): void
    {
        if (strlen($data['name']) === 0) {
            $this->error = 'Das Feld braucht einen Namen.';
            return;
        }

        $types = ['text', 'date', 'url', 'email', 'longtext'];

        if (!in_array($data['type'], $types)) {
            $this->error = 'Dieser Feldtyp existiert nicht.';
            return;
        }

        $this->getFields();
        $this->dispatch('close-modal', name: 'addCustomField');
    }


    public function getFields(): array
    {
        $fields = Schema::getColumnListing('customers');

        return $filteredFields = array_diff($fields, ['id', 'created_at', 'updated_at', 'custom_fields']);
    }

    public function getFieldSettings()
    {
        if (empty($this->model)) {
            return collect();
        }

        $fieldSettingClass = $this->model . 'FieldSetting';

        if (class_exists($fieldSettingClass)) {
            return app()->make($fieldSettingClass)::all();
        }

        return collect();
    }


    public function saveSettings(array $data): void
    {
        if ($data['template']) {
            FormTemplate::updateOrCreate([
                'model' => $this->model,
            ], [
                'grid_columns' => $data['template']['grid_columns'],
            ]);
        }
    }

    public function render(): View
    {
        return view('livewire.model-form-builder');
    }
}
