<?php

namespace App\Services;

use App\Models\Contact;

class ContactService
{
    public function create(array $data): void
    {
        $contact = Contact::create($data);

        dd($contact);
    }
}
