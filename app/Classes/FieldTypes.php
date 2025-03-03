<?php

namespace App\Classes;

class FieldTypes
{
    public static function getFieldTypes(): array
    {
        return [
            [
                'name' => 'Text',
                'type' => 'text',
                'validationRules' => 'string|max:255|min:3'
            ],
            [
                'name' => 'Datum',
                'type' => 'date',
                'validationRules' => 'string|max:255|min:3'
            ],
            [
                'name' => 'URL',
                'type' => 'url',
                'validationRules' => 'url|max:255|min:3'
            ],
            [
                'name' => 'E-Mail',
                'type' => 'email',
                'validationRules' => 'email|max:255|min:3'
            ],
            [
                'name' => 'Langer Text',
                'type' => 'longtext',
                'validationRules' => 'string|min:3'
            ],
            [
                'name' => 'Auswahl',
                'type' => 'select',
                'validationRules' => 'string|min:3'
            ],
        ];
    }
}
