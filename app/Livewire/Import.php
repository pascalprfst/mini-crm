<?php

namespace App\Livewire;

use App\Services\CsvService;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class Import extends Component
{
    use WithFileUploads;

    public ?TemporaryUploadedFile $file = NULL;
    public string $model = '';
    public array $tableColumns = [];
    public array $uploadColumns = [];
    public string $error = '';

    public function updatedFile(): void
    {
        $this->error = '';

        if ($this->file->getMimeType() !== 'text/csv') {
            $this->error = 'Dieser Dateityp ist nicht erlaubt. Bitte benutze nur Datein mit der Endung .csv oder .xlsx.';
            return;
        }

        $csvService = new CsvService($this->file->getRealPath());

        dd($csvService->read());

        // Nach Model Auswahl Tabellenspalten als Ziel ausgeben
        // Spalten der CSV azeigen
    }

    public function render(): View
    {
        return view('livewire.import');
    }
}
