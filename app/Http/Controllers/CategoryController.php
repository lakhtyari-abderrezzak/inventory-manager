<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('dashboard.categories.index');
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function edit($id)
    {
        return view('dashboard.categories.edit', compact('id'));
    }
}
