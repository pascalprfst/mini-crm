<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\CustomField;

class CustomerService
{
    public function create($data): void
    {

        $customer = Customer::create();

        $filteredArray = array_filter($data, function ($value) {
            return !is_null($value);
        });

        $keys = array_keys($filteredArray);

        CustomField::where('model', 'CUSTOMER')->whereIn('slug', $keys)->get()
            ->each(function ($customField) use ($data, $customer, $keys) {
                $customField->customValues()->create([
                    'customer_id' => $customer->id,
                    'str_value' => in_array($customField->type, ['text', 'email', 'url', 'date']) ? $data[$customField->slug] : NULL,
                    'txt_value' => $customField->type === 'longtext' ? $data[$customField->slug] : NULL,
                    'int_value' => $customField->type === 'number' ? $data[$customField->slug] : NULL,
                ]);
            });
    }
}
