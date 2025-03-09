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

        $this->uploadColumns = CSVService::getData($this->file->getRealPath(), true);
        
    }

    public function updatedModel(): void
    {
        $model = config('field-settings.' . $this->model);

        $this->tableColumns = $model::select('field_name', 'slug')->get()->toArray();

        $this->js('getTableColumns', $this->tableColumns);

        $this->js('getUploadColumns', $this->uploadColumns);
    }

    public function render(): View
    {
        return view('livewire.import');
    }
}
