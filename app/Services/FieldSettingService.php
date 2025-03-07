<?php

namespace App\Services;

use App\Models\CustomerFieldSetting;
use Illuminate\Support\Collection;

class FieldSettingService
{
    private string $type;

    /**
     * Create a new class instance.
     */
    public function __construct(string $type)
    {
        $this->type = $type;
    }

    public function getFieldSettings(): Collection|null
    {
        return match ($this->type) {
            'customer' => CustomerFieldSetting::orderBy('order', 'asc')->get(),
            default => null,
        };
    }

}
