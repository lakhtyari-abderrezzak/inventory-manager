<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;

class OrderList extends Component
{
    public $search = '';

    public function delete($id)
    {
        $order = Order::findOrFail($id);
        // Delete associated order items
        foreach ($order->items as $item) {
            $item->delete();
        }
        // Delete the order itself
        $order->delete();

        $this->dispatch('flash', type: 'success', message: 'Order deleted successfully!');

    }

    public function render()
    {
        // Fetch all orders from the database
        $orders = Order::with('customer', 'items')
            ->where('order_number', 'like', '%' . $this->search . '%')
            ->latest()
            ->paginate(10);

        return view('livewire.order-list', compact('orders'));
    }
}
