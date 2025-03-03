<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class TableBuilder extends Component
{
    public string $model = '';

    public function render(): View
    {
        return view('livewire.table-builder');
    }
}
