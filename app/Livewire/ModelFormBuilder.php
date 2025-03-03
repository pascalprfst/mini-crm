<?php

namespace App\Livewire;

use App\Classes\FieldTypes;
use App\Models\CustomerValue;
use App\Models\CustomField;
use App\Models\FormTemplate;
use Illuminate\Support\Str;
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

        $this->getFields();

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

        $orderCount = CustomField::where('model', 'CUSTOMER')->count();

        CustomField::create([
            'model' => 'CUSTOMER',
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
            'type' => $data['type'],
            'required' => $data['required'],
            'order' => $orderCount + 1,
        ]);

        $this->getFields();
        $this->dispatch('close-modal', name: 'addCustomField');
    }


    public function deactivateCustomField(CustomerValue $field): void
    {
    }

    public function getFields(): void
    {
        $this->customFields = [];

        $customFields = CustomField::where('model', $this->model)->get();

        foreach ($customFields as $customField) {
            $this->customFields[] = [
                'id' => $customField->id,
                'name' => $customField->name,
                'required' => $customField->required,
                'type' => $customField->type,
                'order' => $customField->order,
                'value' => '',
            ];
        }
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
