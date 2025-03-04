<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $values = [];

        foreach ($this->values as $key => $value) {
            $values['id'] = $value->id;
            $values['value'] = $value->str_value;
        }

        return $values;
    }
}
