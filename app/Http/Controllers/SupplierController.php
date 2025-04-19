<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        return view('dashboard.suppliers.index');
    }

    public function show(Supplier $supplier)
    {
        $supplier = Supplier::with('products')->findOrFail($supplier->id);
        return view('dashboard.suppliers.show', compact('supplier'));
    }

    public function create()
    {
        return view('dashboard.suppliers.create');
    }

    public function edit(Supplier $supplier)
    {
        $supplierId = $supplier->id;
        return view('dashboard.suppliers.edit', compact('supplier', 'supplierId'));
    }
}
