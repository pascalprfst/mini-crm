<?php

namespace App\Actions;

use App\Classes\FieldTypes;

class FormRequestValidator
{
    /**
     * Create a new class instance.
     */
    public function handle(string $model): array
    {
        $model = config('field-settings.' . $model);

        $fieldTypes = FieldTypes::getFieldTypes();
        $fieldSettings = $model::where('active', true)->get();

        $rules = [];

        foreach ($fieldSettings as $fieldSetting) {
            $rules[$fieldSetting->slug] = '';
            foreach ($fieldTypes as $type) {
                if ($type['type'] === $fieldSetting->field_type) {
                    $rules[$fieldSetting->slug] = $type['validationRules'] .= $fieldSetting->required ? '|required' : '|nullable';
                }
            }
        }

        return $rules;
    }
}
