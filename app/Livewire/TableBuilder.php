<?php

namespace App\Livewire;

use App\Models\Customer;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;

class TableBuilder extends Component
{
    public string $model = 'CUSTOMER';
    public array $customFields = [];
    public Collection $customers;

    public function mount(): void
    {
        $this->getFields();

        $this->customers = Customer::all();

    }

    public function updatedModel(): void
    {
        $this->getFields();
    }

    public function getFields(): void
    {
    }

    public function render(): View
    {
        return view('livewire.table-builder')->layout('layouts.app');
    }
}
