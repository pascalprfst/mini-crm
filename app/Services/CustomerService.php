<?php

namespace App\Services;

use App\Models\Customer;

class CustomerService
{
    public function create(array $data): void
    {
        $contact = Customer::create($data);
    }
}
