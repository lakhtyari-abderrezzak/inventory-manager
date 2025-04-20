<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('dashboard.customers.index');
    }

    public function create()
    {
        return view('dashboard.customers.create');
    }
    
    public function show(Customer $customer)
    {
        return view('dashboard.customers.show', compact('customer'));
    }
    
    public function edit(Customer $customer)
    {
        return view('dashboard.customers.edit', [
            'customerId' => $customer->id,
        ]);
    }
   
}
