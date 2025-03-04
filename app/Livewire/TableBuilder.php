<?php

namespace App\Livewire;

use App\Models\CustomField;
use Illuminate\View\View;
use Livewire\Component;

class TableBuilder extends Component
{
    public string $model = '';
    public array $customFields = [];

    public function updatedModel(): void
    {
        $this->getFields();
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

    public function render(): View
    {
        return view('livewire.table-builder');
    }
}
