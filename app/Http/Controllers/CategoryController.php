<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('dashboard.categories.index');
    }
    public function show(Category $category)
    {
        return view('dashboard.categories.show', compact('category'));
    }
  

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function edit(Category $category)
    {
        $categoryId = $category->id;
        return view('dashboard.categories.edit', compact('category', 'categoryId'));
    }
  
}
