<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;
use Ramsey\Collection\Collection;

class CustomerController extends Controller
{
    public function index()
    {
        return CustomerResource::collection(Customer::with('values')->get());
    }
}
