<?php

namespace App\Livewire;

use App\Models\CustomField;
use Illuminate\View\View;
use Livewire\Component;

class Export extends Component
{
    public string $model = '';

    public function render(): View
    {
        $fields = CustomField::where('model', $this->model)->get();

        return view('livewire.export', [
            'fields' => $fields,
        ]);
    }
}
