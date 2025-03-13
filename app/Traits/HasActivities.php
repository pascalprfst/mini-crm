<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait HasActivities
{
    public static function bootHasActivities(): void
    {
        static::created(function (Model $model): void {
            dd("Test");
        });

        static::updated(function (Model $model): void {
            dd("Test");
        });

        static::updated(function (Model $model): void {
            dd("Test");
        });
    }
}
