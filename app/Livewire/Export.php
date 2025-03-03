<?php

namespace App\Livewire;

use App\Models\CustomerValue;
use App\Models\CustomField;
use Illuminate\View\View;
use Livewire\Component;

class Export extends Component
{
    public string $model = '';
    public string $error = '';

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
        $fields = CustomField::where('model', $this->model)->get();

        return view('livewire.export', [
            'fields' => $fields,
        ]);
    }
}
