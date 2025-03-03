<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Models\CustomField;
use App\Models\FormTemplate;
use App\Services\CustomerService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function create(): View
    {
        return view('customer.index', [
            'formFields' => CustomField::where('model', 'CUSTOMER')->get(),
            'formTemplate' => FormTemplate::where('model', 'CUSTOMER')->first(),
        ]);
    }

    public function store(StoreCustomerRequest $request, CustomerService $service): RedirectResponse
    {
        $service->create($request->validated());

        return redirect()->route('customer.index')->with('success', 'Kunde erfolgreich angelegt.');
    }
}
