<?php

namespace App\Http\Requests;

use App\Classes\FieldTypes;
use App\Models\CustomerFieldSetting;
use App\Models\CustomerValue;
use App\Models\CustomField;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class StoreCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $fieldTypes = FieldTypes::getFieldTypes();
        $fieldSettings = CustomerFieldSetting::where('active', true)->get();

        // Alle aktiven Felder erhalten
        // slug als key setzen
        // value als regeln der fieldTypes
        // required/nullable anhand der fieldsettings

        $data = [];

        return $data;
    }
}
