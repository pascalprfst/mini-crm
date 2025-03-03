<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CustomField extends Model
{
    protected $guarded = ['id'];

    public function customValues(): HasMany
    {
        return $this->hasMany(CustomerValue::class);
    }
}

