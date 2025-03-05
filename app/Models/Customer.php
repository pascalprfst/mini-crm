<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    protected $guarded = ['id'];

    public function values(): HasMany
    {
        return $this->hasMany(CustomerValue::class);
    }

    public function getValues(): \Illuminate\Support\Collection
    {
        $customFields = CustomField::where('model', 'CUSTOMER')->get();

        $values = CustomerValue::where('customer_id', $this->id)
            ->whereIn('custom_field_id', $customFields->pluck('id'))
            ->get()
            ->keyBy('custom_field_id');

        $customValues = [];
        foreach ($customFields as $field) {
            $value = $values->get($field->id);

            if ($value) {
                switch ($field->type) {
                    case 'text':
                        $customValues[$field->name] = $value->str_value;
                        break;
                    case 'email':
                        $customValues[$field->name] = $value->str_value;
                        break;
                    case 'longtext':
                        $customValues[$field->name] = $value->txt_value;
                        break;
                    case 'number':
                        $customValues[$field->name] = $value->int_value;
                        break;
                    default:
                        $customValues[$field->name] = 'Unbekannter Typ';
                }
            } else {
                $customValues[$field->name] = 'Nicht gesetzt';
            }
        }

        return collect($customValues);
    }
}
