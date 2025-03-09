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
    }

    public function updatedModel(): void
    {
        $template = FormTemplate::where('model', $this->model)->first();

        if ($template) {
            $this->columns = $template->grid_columns ?? 2;
        }

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

        $model = config('field-settings.' . $this->model);
        $baseSlug = Str::slug($data['name']);
        $slug = $baseSlug;
        $counter = 1;

        while ($model::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

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
            $setting->update([
                'order' => $setting->order = $this->fieldSettings->count(),
            ]);

            $model = config('field-settings.' . $this->model);

            $this->fieldSettings->where('order', '>', $oldPosition)
                ->where('id', '!=', $setting->id)
                ->each(function ($fieldSetting) {
                    $fieldSetting->update([
                        'order' => $fieldSetting->order - 1,
                    ]);
                });
        }

        $this->fieldSettings = $this->getFieldSettings();
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
