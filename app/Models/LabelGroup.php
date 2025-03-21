<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LabelGroup extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'values' => 'array',
    ];
}
