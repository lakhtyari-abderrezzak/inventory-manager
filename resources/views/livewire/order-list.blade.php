<div>
    <!-- Search Bar (optional) -->
    <div class="mb-6">
        <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search orders by order number or customer name..."
            class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300" />
    </div>

    <!-- Orders Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @forelse($orders as $order)
            <div wire:key="order-{{$order->id}}" class="bg-white shadow rounded-2xl p-4 hover:shadow-md transition">
                <!-- Order Summary -->
                <h2 class="text-lg font-semibold text-gray-800">Order #{{ $order->order_number }}</h2>
                <p class="text-sm text-gray-500">Customer: {{ $order->customer->name }}</p>
                <p class="text-sm text-gray-600 mt-2">Status: <span class="font-semibold">{{ ucfirst($order->status) }}</span></p>
                <p class="text-sm text-gray-600">Total Amount: <span class="font-semibold">${{ number_format($order->total_amount, 2) }}</span></p>
                <p class="text-sm text-gray-600">Payment Status: <span class="font-semibold">{{ ucfirst($order->payment_status) }}</span></p>

                <!-- Order Items -->
                <div class="mt-4">
                    <h5 class="text-sm font-semibold text-gray-700">Items:</h5>
                    <ul class="space-y-2">
                        @foreach($order->items as $item)
                            <li class="text-sm text-gray-600">
                                {{ $item->quantity }} x {{ $item->product->name }} (${{ number_format($item->price, 2) }}) 
                                - ${{ number_format($item->total, 2) }}
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Action Buttons -->
                <div class="mt-4 flex justify-between">
                    <a wire:navigate href="{{ route('orders.show', $order) }}" class="text-blue-600 text-sm hover:underline">View</a>
                    <a wire:navigate href="{{ route('orders.edit', $order) }}" class="text-yellow-500 text-sm hover:underline">Edit</a>
                    <a wire:click="delete({{ $order->id }})" class="text-red-500 text-sm hover:underline cursor-pointer">Delete</a>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-gray-500">
                No orders found.
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="my-6">
        {{ $orders->links() }}
    </div>
</div>
