<x-layouts.app>
    <div class="max-w-4xl mx-auto px-4 py-8">
        <div class="bg-white shadow-xl rounded-2xl p-6 space-y-6">

            <!-- Supplier Header -->
            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-2">{{ $supplier->supplier_name }}</h2>
                <p class="text-sm text-gray-500">
                    Status:
                    @if ($supplier->is_active)
                        <span class="text-green-600 font-semibold">Active</span>
                    @else
                        <span class="text-red-600 font-semibold">Inactive</span>
                    @endif
                </p>
            </div>

            <!-- Contact Info -->
            <div class="grid md:grid-cols-2 gap-4 text-gray-700">
                <p><span class="font-semibold">Primary Contact:</span> {{ $supplier->primary_contact_name ?? 'N/A' }}</p>
                <p><span class="font-semibold">Phone:</span> {{ $supplier->phone ?? 'N/A' }}</p>
                <p><span class="font-semibold">Email:</span> {{ $supplier->email ?? 'N/A' }}</p>
                <p><span class="font-semibold">Country:</span> {{ $supplier->country ?? 'N/A' }}</p>
                <p><span class="font-semibold">City:</span> {{ $supplier->city ?? 'N/A' }}</p>
                <p class="md:col-span-2"><span class="font-semibold">Address:</span> {{ $supplier->address ?? 'N/A' }}</p>
            </div>

            <!-- Actions -->
            <div class="flex gap-3 mt-6">
                <a wire:navigate href="{{ route('suppliers.edit', $supplier->id) }}"
                   class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700 transition">
                    Edit Supplier
                </a>
                {{-- <livewire:delete-supplier :supplier="$supplier->id" /> --}}
            </div>
        </div>

        <!-- Optional: Linked Products -->
        <div class="mt-10 bg-white rounded-2xl shadow p-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Products Supplied</h3>

            @if ($supplier->products->count())
                <ul class="list-disc pl-5 text-gray-700 space-y-1">
                    @foreach ($supplier->products as $product)
                        <li>
                            <a href="{{ route('products.show', $product->id) }}"
                               class="text-blue-600 hover:underline">
                               {{ $product->name }} ({{ $product->quantity }} {{ $product->unit }})
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500">No products linked to this supplier.</p>
            @endif
        </div>
    </div>
</x-layouts.app>
