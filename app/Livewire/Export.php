<?php

namespace App\Livewire;

use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;

class Export extends Component
{
    public string $model = '';
    public string $error = '';
    public Collection $fields;
    public Collection $fieldsToExport;

    public function updatedModel(): void
    {
        $model = config('field-settings.' . $this->model);

        $this->fields = $model::orderBy('order', 'ASC')->get();
    }

    public function selectFieldForExport(int $id): void
    {
    }

    public function export(array $data): void
    {
        if ($data["type"] !== "csv" && $data["type"] !== "excel") {
            $this->error = 'Es wurde kein valider Dateityp ausgewählt.';
            return;
        }

        $forbiddenChars = '/[\/\\\?%*:|"<>]/';

        if (empty($data["filename"]) || preg_match($forbiddenChars, $data['filename'])) {
            $this->error = 'Der Dateiname ist nicht erlaubt.';
            return;
        }

        $this->error = '';

        if ($data['type'] === 'csv') {

        } else if ($data['type'] === 'excel') {

        }
    }

    public function render(): View
    {
        return view('livewire.export')->layout('layouts.app');
    }
}
