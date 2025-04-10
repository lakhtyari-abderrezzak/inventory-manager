<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('dashboard.products.index');
    }

    public function create()
    {
        return view('products.create');
    }

    public function edit($id)
    {
        return view('products.edit', compact('id'));
    }
}
