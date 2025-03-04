<?php

namespace App\Livewire;

use App\Models\CustomField;
use Illuminate\View\View;
use Livewire\Component;

class TableBuilder extends Component
{
    public string $model = 'CUSTOMER';
    public array $customFields = [];

    public function mount(): void
    {
        $this->getFields();

        // Seeder für customFields anpassen
        // Anhand der customFields die ersten 5 Werte Batches ziehen
        // Anhand der customFields Tabelle generieren
        // Erstmal fixe Tabellen Breiten
        // Spalten größen dynamisch setzen
    }

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
                'order' => $customField->order,
            ];
        }
    }

    public function render(): View
    {
        return view('livewire.table-builder');
    }
}
