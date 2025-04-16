<x-layouts.app>
    <div class="max-w-6xl mx-auto px-4 py-8">
        <div class="bg-white shadow-xl rounded-2xl p-6 space-y-6">

            <!-- Category Name -->
            <div class="border-b pb-4">
                <h2 class="text-3xl font-bold text-gray-800">{{ $category->name }}</h2>
                <p class="text-gray-500 mt-1">
                    {{ $category->description ?? 'No description provided.' }}
                </p>
            </div>

            <!-- Category Details -->
            <div class="space-y-3 text-gray-700">
                <p>
                    <span class="font-semibold">Status:</span>
                    <span class="inline-block px-2 py-1 rounded-full text-sm font-medium
                        {{ $category->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $category->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-2 mt-6">
                <a wire:navigte href="{{ route('categories.edit', $category->id) }}"
                    class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                    Edit Category
                </a>

                {{-- <livewire:delete-category :category="$category->id" />  --}}
            </div>

        </div>

       <!-- Related Products Card Section -->
<div class="mt-10 bg-white rounded-2xl shadow p-6">
    <h3 class="text-xl font-semibold text-gray-800 mb-4">Related Products</h3>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @forelse ($category->products as $product)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <a href="{{ route('products.show', $product->id) }}" class="block">
                    <!-- Product Image -->
                    <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}"
                        class="w-full h-48 object-cover">
                    
                    <!-- Product Info -->
                    <div class="p-4">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">{{ $product->name }}</h4>
                        {{-- Show description  --}}
                        @if($product->description)
                            <p class="text-gray-600 mb-2">{{ $product->description }}</p>
                        @endif
                    </div>
                </a>
            </div>
        @empty
            <p>No products found in this category.</p>
        @endforelse
    </div>
</div>

       
    </div>
</x-layouts.app>
