<div>
    <div class="mb-6">
        <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search products by name or SKU..."
            class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300" />
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @forelse($products as $product)
            <div class="bg-white shadow rounded-2xl p-4 hover:shadow-md transition">
                <img src="{{ asset( 'storage/' . $product->image_path ) ?? 'https://via.placeholder.com/300x200.png?text=Product+Image' }}"
                    class="rounded-lg w-full h-40 object-cover mb-4" alt="Product Image">

                <h2 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h2>
                <p class="text-sm text-gray-500">SKU: {{ $product->sku }}</p>
                <p class="text-sm text-gray-600 mt-2">Stock: <span class="font-semibold">{{ $product->quantity }}
                        units</span></p>
                <p class="text-sm text-gray-600">Price: <span
                        class="font-semibold">${{ number_format($product->price, 2) }}</span></p>

                <div class="mt-4 flex justify-between">
                    <a href="#" class="text-blue-600 text-sm hover:underline">View</a>
                    <a href="{{ route('products.edit', $product)}}" class="text-yellow-500 text-sm hover:underline">Edit</a>
                    <a wire:click="delete({{$product->id}})" class="text-red-500 text-sm hover:underline">Delete</a>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-gray-500">
                No products found.
            </div>
        @endforelse
    </div>

    <div class="my-6">
        {{ $products->links() }}
    </div>
</div>
