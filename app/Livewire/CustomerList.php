<?php

namespace App\Livewire;

use App\Models\Customer;
use App\Models\CustomerFieldSetting;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class CustomerList extends Component
{
    use withPagination;

    public string $search = '';

    public function render(): View
    {
        $customers = Customer::when($this->search, function ($query) {
            $this->resetPage();

            return $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->orWhere('street', 'like', '%' . $this->search . '%')
                ->orWhere('custom_fields', 'like', '%' . $this->search . '%')
                ->orWhere('city', 'like', '%' . $this->search . '%');
        })->paginate(5);

        return view('livewire.customer-list', [
            'fields' => CustomerFieldSetting::where('active', true)->get()->toArray(),
            'customers' => $customers,
        ])->layout('layouts.app');
    }
}
