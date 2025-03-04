<?php

use App\Http\Controllers\API\V1\CustomerController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('customers', [CustomerController::class, 'index']);
});
