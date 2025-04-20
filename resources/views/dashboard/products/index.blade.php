<x-layouts.app title="products">
    <div class="max-w-7xl mx-auto px-4 py-10">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Products</h1>
    <a wire:navigate href="/products/create" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">+ Add Product</a>
  </div>

  {{-- Livewire component to display the list of products --}}
  <livewire:product-list />

</div>

</x-layouts.app>
