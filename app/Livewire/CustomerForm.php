<?php

namespace App\Livewire;

use App\Classes\FieldTypes;
use App\Models\CustomField;
use Illuminate\View\View;
use Livewire\Component;

class CustomerForm extends Component
{
    public array $customFields = [];
    public array $fieldTypes = [];

    public bool $checked = false;

    public function mount(): void
    {
        $customFields = CustomField::all();
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

        $this->fieldTypes = FieldTypes::getFieldTypes();
    }

    public function addCustomField(array $formData): void
    {

    }

    public function deactivateCustomField(CustomField $field): void
    {
    }

    public function test()
    {
        dd("Test");
    }

    public function render(): View
    {
        return view('livewire.customer-form');
    }
}
