<?php

namespace App\Models;

use App\Traits\HasActivities;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //use HasActivities;

    protected $guarded = ['id'];

    protected $casts = [
        'custom_fields' => 'array'
    ];
}
