<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Fetch all orders from the database
        $orders = Order::with('customer', 'items.product')->latest()->paginate(10);
        return view('dashboard.orders.index', compact('orders'));
    }

    public function create()
    {
        return view('dashboard.orders.create');
    }

    public function show(Order $order)
    {
        return view('dashboard.orders.show', compact('order'));
    }

    public function edit($id)
    {
        return view('dashboard.orders.edit', compact('id'));
    }
    
}
