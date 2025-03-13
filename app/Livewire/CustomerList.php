<?php

namespace App\Livewire;

use App\Models\Customer;
use App\Models\CustomerFieldSetting;
use Illuminate\View\View;
use Livewire\Component;

class CustomerList extends Component
{
    public string $search = '';

    public function render(): View
    {
        $customers = Customer::when($this->search, function ($query) {
            return $query->where('name', 'like', '%' . $this->search . '%');
        })->get();

        return view('livewire.customer-list', [
            'fields' => CustomerFieldSetting::where('active', true)->get()->toArray(),
            'customers' => $customers,
        ])->layout('layouts.app');
    }
}
