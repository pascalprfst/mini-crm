<?php

namespace App\Services;

use App\Actions\StoreCustomField;
use App\Models\Customer;
use App\Models\CustomerFieldSetting;

class CustomerService
{
    public function create(array $data): void
    {
        $customFields = CustomerFieldSetting::where('custom_field', true)
            ->where('active', true)
            ->get(['field_name', 'slug', 'field_type']);

        $customFormData = [];

        foreach ($customFields as $field) {
            $customFormData[$field['slug']] = [
                'name' => $field['field_name'],
                'value' => $data[$field['slug']],
                'type' => $field['field_type'],
            ];
        }

        $customer = Customer::create($data);

        $action = new StoreCustomField();

        $action->handle('customer', $customer->id, $customFormData);
    }
}
