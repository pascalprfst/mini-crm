<?php

namespace App\Livewire;

use App\Models\Customer;
use App\Models\CustomField;
use App\Models\CustomFieldValues;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CustomerForm extends Component
{
    public array $customFields = [];

    public function mount() : void
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
    }

    public function deleteCustomField(CustomField $field) : void
    {
    }

    public function render() : View
    {
        return view('livewire.customer-form');
    }
}
