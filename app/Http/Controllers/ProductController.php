<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('dashboard.products.index');
    }

    public function show($product)
    {
        $product = Product::with(['category', 'supplier'])->findOrFail($product);
        $productId = $product->id;
        return view('dashboard.products.show' , compact('product', 'productId'));
    }
    public function create()
    {
        return view('dashboard.products.create');
    }

    public function edit(Product $product)
    {
        return view('dashboard.products.edit', [
            'productId' => $product->id
        ]);
    }
    
}
