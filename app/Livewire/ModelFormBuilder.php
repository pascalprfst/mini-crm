<?php

namespace App\Livewire;

use App\Classes\FieldTypes;
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
    public array $errors = [];
    public int $columns = 1;

    public function mount(): void
    {
        $this->fieldTypes = FieldTypes::getFieldTypes();
    }

    public function updatedModel(): void
    {
        $customFields = CustomField::where('model', $this->model)->get();
        $this->columns = FormTemplate::where('model', $this->model)->value('grid_columns');

        $this->customFields = [];

        foreach ($customFields as $customField) {
            $this->customFields[] = [
                'id' => $customField->id,
                'name' => $customField->name,
                'slug' => $customField->slug,
                'type' => $customField->type,
                'order' => $customField->order,
                'value' => '',
            ];
        }
    }

    public function addFormField(array $data): void
    {
        // Name validieren
        // Type validieren
        // Error zurück geben

        $orderCount = CustomField::where('model', 'CUSTOMER')->count();

        CustomField::create([
            'model' => 'CUSTOMER',
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
            'type' => $data['type'],
            'required' => $data['required'],
            'order' => $orderCount + 1,
        ]);

        session()->flash('success', "Feld erfolgreich angelegt!");
        $this->redirect(route('dashboard'));
    }

    public function deactivateCustomField(CustomField $field): void
    {
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

        session()->flash('success', "Vorlage erfolgreich gespeichert!");
        $this->redirect(route('dashboard'));
    }

    public function render(): View
    {
        return view('livewire.model-form-builder');
    }
}
