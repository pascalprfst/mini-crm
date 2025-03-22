<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class Calendar extends Component
{


    public function render(): View
    {
        return view('livewire.calendar')->layout('layouts.app');
    }
}
