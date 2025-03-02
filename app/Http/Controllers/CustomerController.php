<?php

namespace App\Http\Controllers;

use App\Models\CustomField;
use App\Models\FormTemplate;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function index(): View
    {
        $formFields = CustomField::where('model', 'CUSTOMER')->get();
        $formTemplate = FormTemplate::where('model', 'CUSTOMER')->first();

        return view('customer.index', [
            'formFields' => $formFields,
            'formTemplate' => $formTemplate,
        ]);
    }
}
