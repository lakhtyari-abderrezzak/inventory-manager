<x-layouts.app>
    <div class="max-w-5xl mx-auto px-4 py-8">
        <div class="bg-white shadow-xl rounded-2xl p-6 grid md:grid-cols-2 gap-6">

            <!-- Product Image -->
            <div class="flex items-center justify-center">
                @if ($product->image_path)
                    <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}"
                        class="rounded-xl w-full h-auto object-cover">
                @else
                    <img src="storage/default.jpg" alt="{{ $product->name }}"
                        class="rounded-xl w-full h-auto object-cover">
                @endif
            </div>

            <!-- Product Details -->
            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-4">{{ $product->name }}</h2>

                <div class="space-y-3 text-gray-700">
                    <p><span class="font-semibold">SKU:</span> {{ $product->sku }}</p>
                    <p><span class="font-semibold">Price:</span> {{ $product->proce }}</p>
                    <p><span class="font-semibold">Stock:</span> {{$product->quantity . ' ' . $product->unit }}</p>
                    <p><span class="font-semibold">Category:</span> {{ $product->category->name }}</p>
                    <p><span class="font-semibold">Supplier:</span> {{ $product->supplier->supplier_name }}</p>
                </div>

                <div class="flex justify-content space-between gap-2 mt-6">
                    <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                        <a wire:navigate href="{{ route('products.edit', $product->id) }}"> Edit Product</a>
                    </button>
                    <livewire:delete-product :product="$product->id" />
                </div>
            </div>

        </div>

        <!-- Product Description -->
        <div class="mt-10 bg-white rounded-2xl shadow p-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-3">Description</h3>
            <p class="text-gray-700 leading-relaxed">
                The Smartphone XYZ is a high-performance device with a sleek design, powerful processor, and
                long-lasting battery. Perfect for everyday use and professional tasks.
            </p>
        </div>
    </div>

</x-layouts.app>
