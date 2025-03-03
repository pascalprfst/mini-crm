<?php

namespace App\Http\Requests;

use App\Classes\FieldTypes;
use App\Models\CustomerValue;
use App\Models\CustomField;
use Illuminate\Foundation\Http\FormRequest;

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
        $customFields = CustomField::where('model', 'CUSTOMER')->get()->toArray();

        $data = [];
        foreach ($customFields as $field) {
            $validationRules = '';

            foreach ($fieldTypes as $type) {
                if ($field['type'] === $type['type']) {
                    $validationRules = $type['validationRules'];
                }
            }
            $data[$field['slug']] = $validationRules .= $field['required'] ? '|required' : '|nullable';
        }
        return $data;
    }
}
