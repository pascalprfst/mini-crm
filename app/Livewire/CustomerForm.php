<?php

namespace App\Livewire;

use App\Models\Customer;
use App\Models\CustomField;
use App\Models\CustomFieldValues;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CustomerForm extends Component
{
    #[Validate('required|string')]
    public string $name;

    #[Validate('required|email')]
    public string $email;

    public array $customFields = [];

    public Customer $customer;
    public CustomFieldValues $customerValues;

    public function mount() : void
    {
        $customFields = CustomField::all();
        foreach ($customFields as $customField) {
            $this->customFields[] = [
                'id' => $customField->id,
                'name' => $customField->name,
                'slug' => $customField->slug,
                'type' => $customField->type,
                'order' => $customField->order,
                'value' => '',
            ];
        }

        $this->customer = Customer::find(1);

        $this->customerValues = CustomFieldValues::where('customer_id', $this->customer->id)->get();
    }

    public function submitCustomer() : void
    {
        $customer = Customer::create([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        foreach ($this->customFields as $customField) {
            CustomFieldValues::create([
                'customer_id' => $customer->id,
                'custom_field_id' => $customField['id'],
                'str_value' => $customField['type'] === 'string' ? $customField['value']  : '',
                'txt_value' => $customField['type'] === 'text' ? $customField['value'] : '',
                'int_value' => $customField['type'] === 'number' ? $customField['value'] : '',
            ]);
        }
    }

    public function render() : View
    {
        return view('livewire.customer-form');
    }
}
