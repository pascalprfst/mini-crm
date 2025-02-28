<?php

namespace App\Classes;

class FieldTypes
{
    public static function getFieldTypes(): array
    {
        return [
            [
                'name' => 'Name',
                'type' => 'text',
            ],
            [
                'name' => 'Datum',
                'type' => 'date',
            ],
            [
                'name' => 'URL',
                'type' => 'url',
            ],
            [
                'name' => 'E-Mail',
                'type' => 'email',
            ],
            [
                'name' => 'Langer Text',
                'type' => 'longtext',
            ],
        ];
    }
}
