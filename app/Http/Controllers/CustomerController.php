<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Models\Customer;
use App\Models\CustomerFieldSetting;
use App\Models\FormTemplate;
use App\Models\LabelGroup;
use App\Services\CustomerService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CustomerController extends Controller
{

    public function show(Customer $customer): View
    {
        return view('customer.show', [
            'customer' => $customer,
        ]);
    }

    public function create(): View
    {
        $fields = CustomerFieldSetting::where('active', true)->get();

        $labelGroups = CustomerFieldSetting::where('active', true)->where('field_type', 'label')->get('slug')->pluck('slug')->toArray();

        $labels = LabelGroup::whereIn('slug', $labelGroups)
            ->where(function ($query) {
                $query->where('model_type', 'customer')
                    ->orWhere('model_type', 'all');
            })
            ->get();


        return view('customer.create', [
            'fields' => $fields,
            'formTemplate' => FormTemplate::where('model', 'CUSTOMER')->first(),
            'labelGroups' => $labels,
        ]);
    }

    public function store(StoreCustomerRequest $request, CustomerService $service): RedirectResponse
    {
        $service->create($request->validated());

        return redirect()->route('customers.create')->with('success', 'Kunde erfolgreich angelegt.');
    }
}
