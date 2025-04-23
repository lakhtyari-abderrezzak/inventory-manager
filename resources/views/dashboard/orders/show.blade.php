<x-layouts.app title="Order Details">
    <div class="max-w-4xl mx-auto p-6 bg-white shadow rounded-xl">
        <h1 class="text-2xl font-bold mb-4 text-gray-800">Order #{{ $order->order_number }}</h1>

        <div class="mb-6">
            <p class="text-gray-700"><strong>Customer:</strong> {{ $order->customer->name }}</p>
            <p class="text-gray-700"><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
            <p class="text-gray-700"><strong>Total Amount:</strong> ${{ number_format($order->total_amount, 2) }}</p>
            <p class="text-gray-700"><strong>Payment Status:</strong> {{ ucfirst($order->payment_status) }}</p>
            <p class="text-gray-700"><strong>Created At:</strong> {{ $order->created_at->format('M d, Y h:i A') }}</p>
        </div>

        <div>
            <h2 class="text-lg font-semibold text-gray-800 mb-3">Order Items</h2>
            <ul class="divide-y divide-gray-200">
                @foreach ($order->items as $item)
                    <li class="py-3 flex items-center justify-between text-gray-700">
                        <div class="flex items-center space-x-4">
                            <!-- Product Image -->
                            <img src="{{ asset($item->product->image_url)  }}" 
                                 alt="{{ $item->product->name }}" 
                                 class="w-10 h-10 rounded-full object-cover border shadow-sm">
        
                            <!-- Product Info -->
                            <div>
                                <div class="font-medium">{{ $item->quantity }} x {{ $item->product->name }}</div>
                                <div class="text-sm text-gray-500">${{ number_format($item->price, 2) }} each</div>
                            </div>
                        </div>
        
                        <!-- Total Price for Item -->
                        <div class="font-semibold">${{ number_format($item->total, 2) }}</div>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="mt-6">
            <a wire:navigate href="{{ route('orders.index') }}" class="text-blue-600 hover:underline text-sm">← Back to Orders</a>
        </div>
    </div>
</x-layouts.app>
