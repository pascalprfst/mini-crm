<?php

namespace App\Livewire;

use App\Classes\FieldTypes;
use App\Models\CustomerFieldSetting;
use App\Models\FormTemplate;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Component;

class ModelFormBuilder extends Component
{
    public string $model = '';
    public array $fieldTypes = [];
    public string $error = '';
    public int $columns = 2;
    public string $form = '';
    public Collection $fieldSettings;

    public function mount(): void
    {
        $this->fieldTypes = FieldTypes::getFieldTypes();
        $this->fieldSettings = collect();
    }

    public function updatedModel(): void
    {
        $template = FormTemplate::where('model', $this->model)->first();
        $this->columns = $template?->grid_columns ?? 2;
        $this->fieldSettings = $this->getFieldSettings();
        $this->form = $this->renderBasicForm();
    }

    public function selectForm(string $type): void
    {
        $this->form = $type === 'select' 
            ? view('components.forms.select-form', ['fieldTypes' => $this->fieldTypes])
            : $this->renderBasicForm();
    }

    public function addFormField(array $data): void
    {
        if (!$this->validateFieldData($data)) {
            return;
        }

        $model = config('field-settings.' . $this->model);
        $slug = $this->generateUniqueSlug($data['name'], $model);
        
        $model::create([
            'field_name' => $data['name'],
            'field_type' => $data['type'],
            'slug' => $slug,
            'order' => $this->fieldSettings->count() + 1,
            'required' => true,
            'custom_field' => true,
        ]);

        $this->fieldSettings = $this->getFieldSettings();
        $this->dispatch('close-modal', name: 'addCustomField');
    }

    private function validateFieldData(array $data): bool
    {
        if (empty($data['name'])) {
            $this->error = 'Das Feld braucht einen Namen.';
            return false;
        }

        $validTypes = collect($this->fieldTypes)->pluck('type')->toArray();
        if (!in_array($data['type'], $validTypes)) {
            $this->error = 'Dieser Feldtyp existiert nicht.';
            return false;
        }

        return true;
    }

    private function generateUniqueSlug(string $name, string $model): string
    {
        $baseSlug = Str::slug($name);
        $slug = $baseSlug;
        $counter = 1;

        while ($model::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    private function renderBasicForm(): View
    {
        return view('components.forms.basic-form', [
            'fieldTypes' => $this->fieldTypes,
        ]);
    }

    public function getFieldSettings(): Collection
    {
        $model = config('field-settings.' . $this->model);
        return $model::orderBy('order', 'ASC')->get();
    }

    public function toggleFieldStatus(CustomerFieldSetting $setting): void
    {
        $oldPosition = $setting->order;
        $setting->active = !$setting->active;
        $setting->save();

        if (!$setting->active) {
            $this->reorderFields($oldPosition, $setting);
        }

        $this->fieldSettings = $this->getFieldSettings();
    }

    private function reorderFields(int $oldPosition, CustomerFieldSetting $setting): void
    {
        $setting->update(['order' => $this->fieldSettings->count()]);

        $model = config('field-settings.' . $this->model);
        $this->fieldSettings
            ->where('order', '>', $oldPosition)
            ->where('id', '!=', $setting->id)
            ->each(fn ($fieldSetting) => $fieldSetting->update(['order' => $fieldSetting->order - 1]));
    }

    public function saveSettings(array $data): void
    {
        if (isset($data['template'])) {
            FormTemplate::updateOrCreate(
                ['model' => $this->model],
                ['grid_columns' => $data['template']['grid_columns']]
            );
        }
    }

    public function saveLabelGroup(array $formData): void
    {
        // Validieren
        // Errors an Alpine mit Event senden
        // In Alpine auf Errors hören
        // Validierte Daten an Action geben
        // LabelGroup speichern
    }

    public function render(): View
    {
        return view('livewire.model-form-builder')->layout('layouts.app');
    }
}
