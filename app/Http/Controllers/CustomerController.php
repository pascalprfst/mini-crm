<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Models\CustomerFieldSetting;
use App\Models\FormTemplate;
use App\Services\CustomerService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function create(): View
    {
        return view('customer.create', [
            'fields' => CustomerFieldSetting::where('active', true)->get(),
            'formTemplate' => FormTemplate::where('model', 'CUSTOMER')->first(),
        ]);
    }

    public function store(StoreCustomerRequest $request, CustomerService $service): RedirectResponse
    {
        dd($request->validated());

        $service->create($request->validated());

        return redirect()->route('customers.create')->with('success', 'Kunde erfolgreich angelegt.');
    }
}
